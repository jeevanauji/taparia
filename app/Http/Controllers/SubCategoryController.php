<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\SubCategory; 

class SubCategoryController extends Controller
{
    public function index()
    {
        // Get all categories from the database
        $categories = Category::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        $subCategories = SubCategory::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        return view('backend.subcategory.index', compact('categories', 'subCategories'));
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'category_id' => 'required|exists:categories,id', // Ensure that category exists in the categories table
            'name' => 'required|string|max:255',
        ]);
    
       if ($request->file('subCategoryImage')) {
            $subCategoryImageFile = $request->file('subCategoryImage');
            $destinationPath = public_path('uploads/subCategoryImage');
            $fileName = uniqid() . '.' . $subCategoryImageFile->getClientOriginalExtension();
            $subCategoryImageFile->move($destinationPath, $fileName);
            $subCategoryImage = 'uploads/subCategoryImage/' . $fileName;
       } else {
           $subCategoryImage = '';
       }
        
        // Create a new subcategory and save it to the database
        $storeSubcategory = SubCategory::create([
            'categoryId' => $request->input('category_id'), // Store the categoryId
            'name' => $request->input('name'), // Store the subcategory name
            'subCategoryImage' => $subCategoryImage,
        ]);
    
        // Redirect to the subcategory page with a success message
        if ($storeSubcategory) {
            return redirect()->route('subcategory.index')->with('success', 'Sub Category successfully added!');
        } else {
            return redirect()->route('subcategory.index')->with('error', 'Sub Category creation failed!');
        }
    }
    
    public function edit($id)
    {
        $categories = Category::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        $subCategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.edit', compact('categories', 'subCategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required', 
            'name' => 'required|string|max:255',
        ]);
    
        if ($request->file('subCategoryImage')) {
            $subCategoryImageFile = $request->file('subCategoryImage');
            $destinationPath = public_path('uploads/subCategoryImage');
            $fileName = uniqid() . '.' . $subCategoryImageFile->getClientOriginalExtension();
            $subCategoryImageFile->move($destinationPath, $fileName);
            $subCategoryImage = 'uploads/subCategoryImage/' . $fileName;
        } else {
            $subCategoryImage = $request->oldSubCategoryImage;
        }
        
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->categoryId = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->subCategoryImage = $subCategoryImage;
        $subCategory->save();

        if ($subCategory) {
            return redirect()->route('subcategory.index')->with('success', 'Sub Category successfully updated!');
        } else {
            return redirect()->route('subcategory.index')->with('error', 'Failed to update the sub category. Please try again.');
        }
    }
    
    public function softDelete($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update(['isDeleted' => '0']);
    
        if ($subCategory) {
            return redirect()->route('subcategory.index')->with('success', 'Sub Category successfully deleted!');
        } else {
            return redirect()->route('subcategory.index')->with('error', 'Failed to delete the sub category. Please try again.');
        }
    }   
}