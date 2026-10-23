<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 
use App\Services\CatalogStatusService;

class CategoryController extends Controller
{
    public function index()
    {
        // Get all categories from the database
        $categories = Category::orderBy('orderStatus')->orderBy('id')->get();
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
            'orderStatus' => ((int) Category::max('orderStatus')) + 1,
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
        app(CatalogStatusService::class)->setCategoryStatus((int) $id, 1);
        return redirect()->route('category.index')->with('success', 'Category and connected catalog items set to inactive.');
    }    

    public function toggleStatus($id)
    {
        $status = app(CatalogStatusService::class)->toggleCategory((int) $id);
        $message = $status === 0
            ? 'Category and connected catalog items activated.'
            : 'Category and connected catalog items set to inactive.';
        return redirect()->route('category.index')->with('success', $message);
    }
}
