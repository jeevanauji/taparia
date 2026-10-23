<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\SubCategory; 
use App\Models\ChildSubCategory; 
use App\Services\CatalogStatusService;
use App\Services\CatalogOrderService;

class ChildSubCategoryController extends Controller
{
    public function index()
    {
        // Get all data from the database
        $categories = Category::where('isDeleted', 0)->orderBy('id', 'DESC')->get();
        $subCategories = SubCategory::where('isDeleted', 0)->orderBy('id', 'DESC')->get();
        $childSubCategories = ChildSubCategory::orderBy('id')->get();
        $childSubCategories = app(CatalogOrderService::class)->sortItems('childsubcategory', $childSubCategories);
        return view('backend.childsubcategory.index', compact('categories', 'subCategories', 'childSubCategories'));
    }
   
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'categoryId' => 'required|exists:categories,id', // Ensure that category exists in the categories table
            'subCategoryId' => 'required|exists:subcategories,id', // Ensure that category exists in the categories table
            'childSubCategoryName' => 'required|string|max:255',
        ]);
    
        if ($request->file('childSubCategoryImage')) {
            $childSubCategoryImageFile = $request->file('childSubCategoryImage');
            $destinationPath = public_path('uploads/childSubCategoryImage');
            $fileName = uniqid() . '.' . $childSubCategoryImageFile->getClientOriginalExtension();
            $childSubCategoryImageFile->move($destinationPath, $fileName);
            $childSubCategoryImage = 'uploads/childSubCategoryImage/' . $fileName;
        } else {
            $childSubCategoryImage = '';
        }
        
        $childSubCategoryData = [
            'categoryId' => $request->input('categoryId'),
            'subCategoryId' => $request->input('subCategoryId'),
            'name' => $request->input('childSubCategoryName'),
            'childSubCategoryImage' => $childSubCategoryImage,
        ];
        $catalogOrder = app(CatalogOrderService::class);
        if ($catalogOrder->hasOrderStatus('childsubcategory')) {
            $childSubCategoryData['orderStatus'] = ((int) ChildSubCategory::max('orderStatus')) + 1;
        }
        $storeChildSubcategory = ChildSubCategory::create($childSubCategoryData);
    
        // Redirect to the subcategory page with a success message
        if ($storeChildSubcategory) {
            return redirect()->route('childsubcategory.index')->with('success', 'Child sub category successfully added!');
        } else {
            return redirect()->route('childsubcategory.index')->with('error', 'Child sub category creation failed!');
        }
    }
    
    public function edit($id)
    {
        $categories = Category::where('isDeleted', 0)->orderBy('id', 'DESC')->get();
        $subCategories = SubCategory::where('isDeleted', 0)->orderBy('id', 'DESC')->get();
        $childSubCategory = ChildSubCategory::findOrFail($id);
        return view('backend.childsubcategory.edit', compact('categories', 'subCategories', 'childSubCategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categoryId' => 'required', 
            'subCategoryId' => 'required', 
            'childSubCategoryName' => 'required|string|max:255',
        ]);
        
        if ($request->file('childSubCategoryImage')) {
            $childSubCategoryImageFile = $request->file('childSubCategoryImage');
            $destinationPath = public_path('uploads/childSubCategoryImage');
            $fileName = uniqid() . '.' . $childSubCategoryImageFile->getClientOriginalExtension();
            $childSubCategoryImageFile->move($destinationPath, $fileName);
            $childSubCategoryImage = 'uploads/childSubCategoryImage/' . $fileName;
        } else {
            $childSubCategoryImage = $request->oldChildSubCategoryImage;
        }
    
        $childSubCategory = ChildSubCategory::findOrFail($id);
        $childSubCategory->categoryId = $request->categoryId;
        $childSubCategory->subCategoryId = $request->subCategoryId;
        $childSubCategory->name = $request->childSubCategoryName;
        $childSubCategory->childSubCategoryImage = $childSubCategoryImage;
        $childSubCategory->save();

        if ($childSubCategory) {
            return redirect()->route('childsubcategory.index')->with('success', 'Child sub category successfully updated!');
        } else {
            return redirect()->route('childsubcategory.index')->with('error', 'Failed to update the child sub category. Please try again.');
        }
    }
    
    public function softDelete($id)
    {
        app(CatalogStatusService::class)->setChildSubCategoryStatus((int) $id, 1);
        return redirect()->route('childsubcategory.index')->with('success', 'Child category and connected products set to inactive.');
    }

    public function toggleStatus($id)
    {
        $status = app(CatalogStatusService::class)->toggleChildSubCategory((int) $id);
        $message = $status === 0
            ? 'Child category and connected products activated.'
            : 'Child category and connected products set to inactive.';
        return redirect()->route('childsubcategory.index')->with('success', $message);
    }
}
