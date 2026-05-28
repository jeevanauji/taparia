<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildSubCategory;
use App\Models\Products;
use App\Models\ProductImages;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        $subCategories = SubCategory::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        $childSubCategories = ChildSubCategory::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        return view('backend.products.create', compact('categories', 'subCategories', 'childSubCategories'));
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'categoryId' => 'required|exists:categories,id',
            'productName' => 'required',
            'productImages.*' => 'required|image',
        ]);

        if ($request->file('productCatalogue')) {
            $productCatalogueFile = $request->file('productCatalogue');
            $destinationPath = public_path('uploads/catalogue');
            $fileName = uniqid() . '.' . $productCatalogueFile->getClientOriginalExtension();
            $productCatalogueFile->move($destinationPath, $fileName);
            $productCatalogue = 'uploads/catalogue/' . $fileName;
        } else {
            $productCatalogue = '';
        }

        if ($request->file('productImage')) {
            $productImageFile = $request->file('productImage');
            $destinationPath = public_path('uploads/productImage');
            $fileName = uniqid() . '.' . $productImageFile->getClientOriginalExtension();
            $productImageFile->move($destinationPath, $fileName);
            $productImage = 'uploads/productImage/' . $fileName;
        } else {
            $productImage = '';
        }

        $storeProduct = Products::create([
            'categoryId' => $request->input('categoryId'),
            'subCategoryId' => $request->input('subCategoryId'),
            'childSubCategoryId' => $request->input('childSubCategoryId'),
            'productName' => $request->input('productName'),
            'isNew' => $request->input('isNew'),
            'productCatalogue' => $productCatalogue,
            'productImage' => $productImage,
            'productOverview' => $request->input('productOverview'),
            'productHighlighting' => $request->input('productHighlighting'),
            'productSpecifications' => $request->input('productSpecifications'),
        ]);

        if ($request->hasFile('productImages')) {
            foreach ($request->file('productImages') as $image) {
                // Define the destination path
                $destinationPath = public_path('uploads/images');
                // Generate a unique file name
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                // Move the file to the public directory
                $image->move($destinationPath, $fileName);
                // Save the full path in the database
                $fullPath = 'uploads/images/' . $fileName;

                ProductImages::create([
                    'productId' => $storeProduct->id,
                    'productImage' => $fullPath,
                ]);
            }
        }

        if ($storeProduct) {
            return redirect()->route('products.index')->with('success', 'Product successfully added!');
        } else {
            return redirect()->route('products.index')->with('error', 'Product creation failed!');
        }
    }

    public function info($id)
    {
        $productInfo = products::findOrFail($id);
        $productImages = ProductImages::where('productId', $id)->orderBy('id', 'DESC')->get();
        return view('backend.products.info', compact('productInfo', 'productImages'));
    }

    public function edit($id)
    {
        $categories = Category::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        $subCategories = SubCategory::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        $childSubCategories = ChildSubCategory::where('isDeleted', 1)->orderBy('id', 'DESC')->get();
        $productInfo = Products::findOrFail($id);
        $productImages = ProductImages::where('productId', $id)->where('isDeleted', 1)->get();
        return view('backend.products.edit', compact('categories', 'subCategories', 'childSubCategories', 'productInfo', 'productImages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categoryId' => 'required|exists:categories,id',
            'productName' => 'required',
        ]);

        if ($request->file('productCatalogue')) {
            $productCatalogueFile = $request->file('productCatalogue');
            $destinationPath = public_path('uploads/catalogue');
            $fileName = uniqid() . '.' . $productCatalogueFile->getClientOriginalExtension();
            $productCatalogueFile->move($destinationPath, $fileName);
            $productCatalogue = 'uploads/catalogue/' . $fileName;
        } else {
            $productCatalogue = $request->oldProductCatalogue;
        }

        if ($request->file('productImage')) {
            $productImageFile = $request->file('productImage');
            $destinationPath = public_path('uploads/productImage');
            $fileName = uniqid() . '.' . $productImageFile->getClientOriginalExtension();
            $productImageFile->move($destinationPath, $fileName);
            $productImage = 'uploads/productImage/' . $fileName;
        } else {
            $productImage = $request->oldProductImage;
        }

        $product = Products::findOrFail($id);
        $product->categoryId = $request->categoryId;
        $product->subCategoryId = $request->subCategoryId;
        $product->childSubCategoryId = $request->childSubCategoryId;
        $product->productName = $request->productName;
        $product->isNew = $request->isNew;
        $product->productCatalogue = $productCatalogue;
        $product->productImage = $productImage;
        $product->productOverview = $request->productOverview;
        $product->productHighlighting = $request->productHighlighting;
        $product->productSpecifications = $request->productSpecifications;
        $product->save();

        if ($request->hasFile('productImages')) {
            foreach ($request->file('productImages') as $index => $image) {
                $destinationPath = public_path('uploads/images');
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $fileName);
                $fullPath = 'uploads/images/' . $fileName;

                ProductImages::where('id', $request['productImageRowId'][$index])
                    ->where('productId', $product->id)
                    ->update(['productImage' => $fullPath]);
            }
        }

        if ($request->hasFile('newProductImages')) {
            foreach ($request->file('newProductImages') as $newImage) {
                // Define the destination path
                $destinationPath = public_path('uploads/images');
                // Generate a unique file name
                $fileName = uniqid() . '.' . $newImage->getClientOriginalExtension();
                // Move the file to the public directory
                $newImage->move($destinationPath, $fileName);
                // Save the full path in the database
                $fullPath = 'uploads/images/' . $fileName;

                ProductImages::create([
                    'productId' => $product->id,
                    'productImage' => $fullPath,
                ]);
            }
        }

        if ($product) {
            return redirect()->route('products.index')->with('success', 'Product successfully updated!');
        } else {
            return redirect()->route('products.index')->with('error', 'Failed to update the product. Please try again.');
        }
    }

    public function productImageSoftDelete($id)
    {
        $productImages = ProductImages::findOrFail($id);
        $productImages->update(['isDeleted' => '0']);

        if ($productImages) {
            return redirect()->route('product.edit', ['id' => $productImages->productId])->with('success', 'Product image successfully deleted!');
        } else {
            return redirect()->route('product.edit', ['id' => $productImages->productId])->with('error', 'Failed to delete the product. Please try again.');
        }
    }

    public function softDelete($id)
    {
        $product = Products::findOrFail($id);
        $product->update(['isDeleted' => '0']);

        $productImages = ProductImages::where('productId', $id)->update(['isDeleted' => '0']);

        if ($product && $productImages) {
            return redirect()->route('products.index')->with('success', 'Product successfully deleted!');
        } else {
            return redirect()->route('products.index')->with('error', 'Failed to delete the product. Please try again.');
        }
    }
}
