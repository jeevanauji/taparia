<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\SubCategory; 
use App\Models\ChildSubCategory; 

class ChildSubCategoryController extends Controller
{
    public function index()
    {
        // Get all data from the database
        $categories = Category::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        $subCategories = SubCategory::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        $childSubCategories = ChildSubCategory::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
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
        
        $storeChildSubcategory = ChildSubCategory::create([
            'categoryId' => $request->input('categoryId'),
            'subCategoryId' => $request->input('subCategoryId'),
            'name' => $request->input('childSubCategoryName'),
            'childSubCategoryImage' => $childSubCategoryImage,
        ]);
    
        // Redirect to the subcategory page with a success message
        if ($storeChildSubcategory) {
            return redirect()->route('childsubcategory.index')->with('success', 'Child sub category successfully added!');
        } else {
            return redirect()->route('childsubcategory.index')->with('error', 'Child sub category creation failed!');
        }
    }
    
    public function edit($id)
    {
        $categories = Category::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        $subCategories = SubCategory::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
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
        $childSubCategory = ChildSubCategory::findOrFail($id);
        $childSubCategory->update(['isDeleted' => '0']);
    
        if ($childSubCategory) {
            return redirect()->route('childsubcategory.index')->with('success', 'Sub Category successfully deleted!');
        } else {
            return redirect()->route('childsubcategory.index')->with('error', 'Failed to delete the sub category. Please try again.');
        }
    }
}
