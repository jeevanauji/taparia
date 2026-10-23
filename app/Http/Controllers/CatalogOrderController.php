<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CatalogOrderService;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildSubCategory;
use App\Models\Products;

class CatalogOrderController extends Controller
{
    public function index(CatalogOrderService $catalogOrderService)
    {
        $categories = $catalogOrderService->sortItems('category', Category::where('isDeleted', 0)->orderBy('id')->get());
        $subCategories = SubCategory::where('isDeleted', 0)->orderBy('id')->get()->groupBy('categoryId');
        $childSubCategories = ChildSubCategory::where('isDeleted', 0)->orderBy('id')->get()->groupBy('subCategoryId');
        $products = Products::where('isDeleted', 0)->orderBy('id')->get();

        foreach ($categories as $category) {
            $categorySubCategories = $catalogOrderService->sortItems(
                'subcategory', $subCategories->get((string) $category->id, collect())
            );

            foreach ($categorySubCategories as $subCategory) {
                $subCategoryChildren = $catalogOrderService->sortItems(
                    'childsubcategory', $childSubCategories->get((string) $subCategory->id, collect())
                );
                $childIds = $subCategoryChildren->pluck('id')->map(fn ($id) => (int) $id)->all();

                foreach ($subCategoryChildren as $childSubCategory) {
                    $childProducts = $products
                        ->where('childSubCategoryId', $childSubCategory->id)
                        ->where('subCategoryId', $subCategory->id)
                        ->values();
                    $childSubCategory->setRelation('orderedProducts', $catalogOrderService->sortProducts($childProducts));
                }

                $directProducts = $products->filter(function ($product) use ($subCategory, $childIds) {
                    return (int) $product->subCategoryId === (int) $subCategory->id
                        && !in_array((int) $product->childSubCategoryId, $childIds, true);
                })->values();

                $subCategory->setRelation('orderedChildren', $subCategoryChildren);
                $subCategory->setRelation('directProducts', $catalogOrderService->sortProducts($directProducts));
            }

            $categorySubCategoryIds = $categorySubCategories->pluck('id')->map(fn ($id) => (int) $id)->all();
            $unassignedProducts = $products->filter(function ($product) use ($category, $categorySubCategoryIds) {
                return (int) $product->categoryId === (int) $category->id
                    && !in_array((int) $product->subCategoryId, $categorySubCategoryIds, true);
            })->values();

            $category->setRelation('orderedSubCategories', $categorySubCategories);
            $category->setRelation('unassignedProducts', $catalogOrderService->sortProducts($unassignedProducts));
        }

        return view('backend.chronology-order.index', compact('categories'));
    }

    public function updateList(Request $request, CatalogOrderService $catalogOrderService)
    {
        $data = $request->validate([
            'type' => ['required', 'in:category,subcategory,childsubcategory,product'],
            'parent_type' => ['required', 'in:root,category,subcategory,childsubcategory'],
            'parent_id' => ['required', 'integer', 'min:0'],
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['required', 'integer', 'distinct'],
        ]);

        $catalogOrderService->updateList(
            $data['type'], $data['parent_type'], (int) $data['parent_id'], $data['ids']
        );

        return response()->json(['message' => 'Order saved.']);
    }
}
