<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class CatalogOrderService
{
    private const TABLES = [
        'category' => 'categories',
        'subcategory' => 'subcategories',
        'childsubcategory' => 'childsubcategories',
        'product' => 'products',
    ];

    public function updateList(string $type, string $parentType, int $parentId, array $ids): void
    {
        $table = self::TABLES[$type] ?? abort(404);
        $ids = array_values(array_unique(array_map('intval', $ids)));
        abort_if($ids === [], 422, 'The order list cannot be empty.');

        $query = DB::table($table)->whereIn('id', $ids);

        if ($type === 'category') {
            abort_unless($parentType === 'root' && $parentId === 0, 422);
        } elseif ($type === 'subcategory') {
            abort_unless($parentType === 'category' && DB::table('categories')->where('id', $parentId)->exists(), 422);
            $query->where('categoryId', $parentId);
        } elseif ($type === 'childsubcategory') {
            abort_unless($parentType === 'subcategory' && DB::table('subcategories')->where('id', $parentId)->exists(), 422);
            $query->where('subCategoryId', $parentId);
        } elseif ($type === 'product') {
            if ($parentType === 'childsubcategory') {
                $child = DB::table('childsubcategories')->where('id', $parentId)->first();
                abort_unless($child, 422);
                $query->where('childSubCategoryId', $parentId)
                    ->where('subCategoryId', $child->subCategoryId);
            } elseif ($parentType === 'subcategory') {
                abort_unless(DB::table('subcategories')->where('id', $parentId)->exists(), 422);
                $childIds = DB::table('childsubcategories')->where('subCategoryId', $parentId)->pluck('id');
                $query->where('subCategoryId', $parentId)
                    ->where(function ($productQuery) use ($childIds) {
                        $productQuery->whereNull('childSubCategoryId')
                            ->orWhere('childSubCategoryId', '')
                            ->orWhereNotIn('childSubCategoryId', $childIds);
                    });
            } elseif ($parentType === 'category') {
                abort_unless(DB::table('categories')->where('id', $parentId)->exists(), 422);
                $subCategoryIds = DB::table('subcategories')->where('categoryId', $parentId)->pluck('id');
                $query->where('categoryId', $parentId)
                    ->where(function ($productQuery) use ($subCategoryIds) {
                        $productQuery->whereNull('subCategoryId')
                            ->orWhere('subCategoryId', '')
                            ->orWhereNotIn('subCategoryId', $subCategoryIds);
                    });
            } else {
                abort(422);
            }
        }

        abort_unless($query->count() === count($ids), 422, 'Items must stay within their current parent.');

        if ($this->hasOrderStatusColumn($table)) {
            foreach ($ids as $index => $id) {
                DB::table($table)->where('id', $id)->update(['orderStatus' => $index + 1]);
            }
            return;
        }

        $orders = $this->storedOrders();
        foreach ($ids as $index => $id) {
            $orders[$type][(string) $id] = $index + 1;
        }
        Storage::disk('local')->put('catalog-order.json', json_encode($orders, JSON_PRETTY_PRINT));
    }

    public function sortProducts(Collection $products): Collection
    {
        return $this->sortItems('product', $products);
    }

    public function sortItems(string $type, Collection $items): Collection
    {
        $orders = $this->storedOrders()[$type] ?? [];

        return $items->sort(function ($left, $right) use ($orders) {
            $leftOrder = isset($orders[(string) $left->id])
                ? (int) $orders[(string) $left->id]
                : $this->attributeOrder($left);
            $rightOrder = isset($orders[(string) $right->id])
                ? (int) $orders[(string) $right->id]
                : $this->attributeOrder($right);

            return ($leftOrder <=> $rightOrder) ?: ((int) $left->id <=> (int) $right->id);
        })->values();
    }

    public function hasOrderStatus(string $type): bool
    {
        $table = self::TABLES[$type] ?? abort(404);
        return $this->hasOrderStatusColumn($table);
    }

    private function hasOrderStatusColumn(string $table): bool
    {
        return collect(Schema::getColumnListing($table))
            ->contains(fn ($column) => strtolower($column) === 'orderstatus');
    }

    private function attributeOrder(object $item): int
    {
        foreach ($item->getAttributes() as $attribute => $value) {
            if (strtolower($attribute) === 'orderstatus' && $value !== null) {
                return (int) $value;
            }
        }

        return (int) $item->id;
    }

    private function storedOrders(): array
    {
        if (!Storage::disk('local')->exists('catalog-order.json')) {
            return [];
        }

        $orders = json_decode(Storage::disk('local')->get('catalog-order.json'), true);
        return is_array($orders) ? $orders : [];
    }
}
