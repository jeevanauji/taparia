<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    public function index()
    {
        // Get all categories from the database
        $categories = Category::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        return view('backend.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'categoryImage' => 'required',
        ]);
        
        if ($request->file('categoryImage')) {
            $categoryImageFile = $request->file('categoryImage');
            $destinationPath = public_path('uploads/categoryImage');
            $fileName = uniqid() . '.' . $categoryImageFile->getClientOriginalExtension();
            $categoryImageFile->move($destinationPath, $fileName);
            $categoryImage = 'uploads/categoryImage/' . $fileName;
        } else {
            $categoryImage = '';
        }

        // Create a new category and save it to the database
        $storeCategory = Category::create([
            'name' => $request->input('name'),
            'categoryImage' => $categoryImage,
        ]);

        // Redirect to the category page with message
        if ($storeCategory) {
            return redirect()->route('category.index')->with('success', 'Category successfully submitted!');
        } else {
            return redirect()->route('category.index')->with('error', 'Category submission failed. Please try again!');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        if ($request->file('categoryImage')) {
            $categoryImageFile = $request->file('categoryImage');
            $destinationPath = public_path('uploads/categoryImage');
            $fileName = uniqid() . '.' . $categoryImageFile->getClientOriginalExtension();
            $categoryImageFile->move($destinationPath, $fileName);
            $categoryImage = 'uploads/categoryImage/' . $fileName;
        } else {
            $categoryImage = $request->oldCategoryImage;
        }
    
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->categoryImage = $categoryImage;
        $category->save();

        if ($category) {
            return redirect()->route('category.index')->with('success', 'Category successfully updated!');
        } else {
            return redirect()->route('category.index')->with('error', 'Failed to update the category. Please try again.');
        }
    }
    
    public function softDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->update(['isDeleted' => '0']);
    
        if ($category) {
            return redirect()->route('category.index')->with('success', 'Category successfully deleted!');
        } else {
            return redirect()->route('category.index')->with('error', 'Failed to delete the category. Please try again.');
        }
    }    
}
