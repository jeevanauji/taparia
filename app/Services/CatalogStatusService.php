<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class CatalogStatusService
{
    public function toggleCategory(int $id): int
    {
        return DB::transaction(function () use ($id) {
            $category = DB::table('categories')->where('id', $id)->lockForUpdate()->first();
            abort_if(!$category, 404);

            $status = (int) $category->isDeleted === 0 ? 1 : 0;
            $this->applyCategoryStatus($id, $status);

            return $status;
        });
    }

    public function setCategoryStatus(int $id, int $status): void
    {
        DB::transaction(function () use ($id, $status) {
            abort_unless(DB::table('categories')->where('id', $id)->exists(), 404);
            $this->applyCategoryStatus($id, $status);
        });
    }

    public function toggleSubCategory(int $id): int
    {
        return DB::transaction(function () use ($id) {
            $subCategory = DB::table('subcategories')->where('id', $id)->lockForUpdate()->first();
            abort_if(!$subCategory, 404);

            $status = (int) $subCategory->isDeleted === 0 ? 1 : 0;
            $this->applySubCategoryStatus($id, $status);

            return $status;
        });
    }

    public function setSubCategoryStatus(int $id, int $status): void
    {
        DB::transaction(function () use ($id, $status) {
            abort_unless(DB::table('subcategories')->where('id', $id)->exists(), 404);
            $this->applySubCategoryStatus($id, $status);
        });
    }

    public function toggleChildSubCategory(int $id): int
    {
        return DB::transaction(function () use ($id) {
            $child = DB::table('childsubcategories')->where('id', $id)->lockForUpdate()->first();
            abort_if(!$child, 404);

            $status = (int) $child->isDeleted === 0 ? 1 : 0;
            $this->applyChildSubCategoryStatus($id, $status);

            return $status;
        });
    }

    public function setChildSubCategoryStatus(int $id, int $status): void
    {
        DB::transaction(function () use ($id, $status) {
            abort_unless(DB::table('childsubcategories')->where('id', $id)->exists(), 404);
            $this->applyChildSubCategoryStatus($id, $status);
        });
    }

    private function applyCategoryStatus(int $categoryId, int $status): void
    {
        $subCategoryIds = DB::table('subcategories')
            ->where('categoryId', $categoryId)
            ->pluck('id');

        $childQuery = DB::table('childsubcategories')
            ->where('categoryId', $categoryId);
        if ($subCategoryIds->isNotEmpty()) {
            $childQuery->orWhereIn('subCategoryId', $subCategoryIds);
        }
        $childSubCategoryIds = $childQuery->pluck('id');

        DB::table('categories')->where('id', $categoryId)->update(['isDeleted' => $status]);

        if ($subCategoryIds->isNotEmpty()) {
            DB::table('subcategories')->whereIn('id', $subCategoryIds)->update(['isDeleted' => $status]);
        }
        if ($childSubCategoryIds->isNotEmpty()) {
            DB::table('childsubcategories')->whereIn('id', $childSubCategoryIds)->update(['isDeleted' => $status]);
        }

        DB::table('products')
            ->where(function ($query) use ($categoryId, $subCategoryIds, $childSubCategoryIds) {
                $query->where('categoryId', $categoryId);
                if ($subCategoryIds->isNotEmpty()) {
                    $query->orWhereIn('subCategoryId', $subCategoryIds);
                }
                if ($childSubCategoryIds->isNotEmpty()) {
                    $query->orWhereIn('childSubCategoryId', $childSubCategoryIds);
                }
            })
            ->update(['isDeleted' => $status]);
    }

    private function applySubCategoryStatus(int $subCategoryId, int $status): void
    {
        $childSubCategoryIds = DB::table('childsubcategories')
            ->where('subCategoryId', $subCategoryId)
            ->pluck('id');

        DB::table('subcategories')->where('id', $subCategoryId)->update(['isDeleted' => $status]);
        if ($childSubCategoryIds->isNotEmpty()) {
            DB::table('childsubcategories')->whereIn('id', $childSubCategoryIds)->update(['isDeleted' => $status]);
        }

        DB::table('products')
            ->where(function ($query) use ($subCategoryId, $childSubCategoryIds) {
                $query->where('subCategoryId', $subCategoryId);
                if ($childSubCategoryIds->isNotEmpty()) {
                    $query->orWhereIn('childSubCategoryId', $childSubCategoryIds);
                }
            })
            ->update(['isDeleted' => $status]);
    }

    private function applyChildSubCategoryStatus(int $childSubCategoryId, int $status): void
    {
        DB::table('childsubcategories')->where('id', $childSubCategoryId)->update(['isDeleted' => $status]);
        DB::table('products')
            ->where('childSubCategoryId', $childSubCategoryId)
            ->update(['isDeleted' => $status]);
    }
}
