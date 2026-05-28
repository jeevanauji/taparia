<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Category; 
use App\Models\SubCategory; 
use App\Models\ChildSubCategory; 
use App\Models\Products;
use App\Models\ProductImages;
use App\Mail\DistributorEmail;
use App\Models\ReportsAndDownloads;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
{
    $newProducts = Products::where('isNew', 'Y')
        ->where('isDeleted', 1)
        ->whereNotNull('productImage')
        ->orderBy('created_at', 'ASC')
        ->get();
    
    // Order categories by orderStatus
    $categories = Category::where('isDeleted', 1)
        ->orderBy('orderstatus', 'ASC')
        ->get();
        

       
    
    $productsByCategory = [];
    foreach ($categories as $category) {
        $products = Products::where('categoryId', $category->id)
            ->where('isNew', 'N')
            ->where('isDeleted', 1)
            ->orderBy('created_at', 'ASC')
            ->take(6)
            ->get();

        $productsByCategory[] = [
            'categoryId' => $category->id,
            'categoryName' => $category->name,
            'products' => $products,
        ];
    }
    
    return view('frontend.index', compact('newProducts', 'categories', 'productsByCategory'));
}

    
    public function aboutUs()
    {
        return view('frontend.about-us');
    }
    
    public function products()
    {
        $categories = Category::where('isDeleted', 1)
            ->orderBy('orderStatus', 'ASC')
            ->get();

        $subCategories = SubCategory::where('isDeleted', 1)
            ->orderBy('orderStatus', 'ASC')
            ->get();
        $childSubCategories = ChildSubCategory::where('isDeleted', 1)->get();
        $products = Products::where('isDeleted', 1)->get();

        // Chunk categories into groups of 5
        $categoryChunks = $categories->chunk(5);
        $totalCategories = $categories->count();

        return view('frontend.products', compact('categories', 'subCategories', 'childSubCategories', 'products', 'categoryChunks', 'totalCategories'));
    }
    
   public function category($categoryName)
{
    $categories = Category::where('isDeleted', 1)
        ->orderBy('orderStatus', 'ASC')
        ->get();

    $subCategories = SubCategory::where('isDeleted', 1)
        ->orderBy('orderStatus', 'ASC')
        ->get();

    $childSubCategories = ChildSubCategory::where('isDeleted', 1)->get();
    $products = Products::where('isDeleted', 1)->get();
    
    // Chunk categories into groups of 5
    $categoryChunks = $categories->chunk(5);
    $totalCategories = $categories->count();
    
    $categoryId = Category::where('name', str_replace('-', ' ', $categoryName))
        ->where('isDeleted', 1)
        ->first();        

    if ($categoryId) {
        $subCategoriesByCategory = SubCategory::where('categoryId', $categoryId->id)
            ->where('isDeleted', 1)
            ->orderBy('orderStatus', 'ASC')
            ->get();

        $subCategoriesWithChildSubCategories = [];
        foreach ($subCategoriesByCategory as $subCategory) {
            $childSubCategoriesBySubCategoryData = ChildSubCategory::where('subCategoryId', $subCategory->id)
                ->where('isDeleted', 1)
                ->orderBy('created_at', 'ASC')
                ->get(); // Removed ->take(30)

            $childSubCategoriesBySubCategory = [];
            foreach ($childSubCategoriesBySubCategoryData as $childSubCategory) {
                $childSubCategoriesBySubCategory[] = [
                    'childSubCategoryName' => $childSubCategory->name,
                ];
            }

            $subCategoriesWithChildSubCategories[] = [
                'subCategory' => $subCategory,
                'childSubCategoriesBySubCategory' => $childSubCategoriesBySubCategory,
            ];
        }

        return view('frontend.products', compact(
            'categories',
            'subCategories',
            'childSubCategories',
            'products',
            'subCategoriesByCategory',
            'subCategoriesWithChildSubCategories',
            'categoryChunks',
            'totalCategories'
        ));
    } else {
        return redirect('products');
    }
}

    public function subCategory($subCategoryName)
    {
        $categories = Category::where('isDeleted', 1)
            ->orderBy('orderStatus', 'ASC')
            ->get();

        $subCategories = SubCategory::where('isDeleted', 1)
            ->orderBy('orderStatus', 'ASC')
            ->get();

        $childSubCategories = ChildSubCategory::where('isDeleted', 1)->get();
        $products = Products::where('isDeleted', 1)->get();
        
        // Chunk categories into groups of 5
        $categoryChunks = $categories->chunk(5);
        $totalCategories = $categories->count();
        
        $subCategoryData = SubCategory::where('name', str_replace('-', ' ', $subCategoryName))->where('isDeleted', 1)->first();
        if ($subCategoryData) {            
            $categoryName = Category::where('id', $subCategoryData->categoryId)->where('isDeleted', 1)->first();            

            $childSubCategoriesWithProducts = [];

            $childSubCategoriesBySubCategory = ChildSubCategory::where('subCategoryId', $subCategoryData->id)
                ->where('isDeleted', 1)
                ->get();

            foreach ($childSubCategoriesBySubCategory as $childSubCategory) {
                $productsData = Products::where('childSubCategoryId', $childSubCategory->id)
                    ->where('isDeleted', 1)
                    ->get();

                $childSubCategoriesWithProducts[] = [
                    'childSubCategory' => $childSubCategory,
                    'productsBychildSubCategory' => $productsData,
                ];
            }
            return view('frontend.products', compact('categories', 'subCategories', 'childSubCategories', 'products', 'categoryName', 'childSubCategoriesWithProducts', 'categoryChunks', 'totalCategories'));
        } else {
            return redirect('products');
        }
    }
    
    public function childSubCategory($childSubCategoryName)
    {
        $categories = Category::where('isDeleted', 1)
            ->orderBy('orderStatus', 'ASC')
            ->get();

        $subCategories = SubCategory::where('isDeleted', 1)
            ->orderBy('orderStatus', 'ASC')
            ->get();
        $childSubCategories = ChildSubCategory::where('isDeleted', 1)->get();
        $products = Products::where('isDeleted', 1)->get();

        // Chunk categories into groups of 5
        $categoryChunks = $categories->chunk(5);
        $totalCategories = $categories->count();

        $childSubCategoryData = ChildSubCategory::where('name', str_replace('-', ' ', $childSubCategoryName))->where('isDeleted', 1)->first();
        if ($childSubCategoryData) {
            $productsByChildSubCategory = Products::where('childSubCategoryId', $childSubCategoryData->id)->where('isDeleted', 1)->get();
            $categoryName = Category::where('id', $childSubCategoryData->categoryId)->where('isDeleted', 1)->first();
            $subCategoryName = SubCategory::where('id', $childSubCategoryData->subCategoryId)->where('isDeleted', 1)->first();
            return view('frontend.products', compact('categories', 'subCategories', 'childSubCategories', 'products', 'categoryName', 'subCategoryName', 'childSubCategoryData', 'productsByChildSubCategory', 'categoryChunks', 'totalCategories'));
        } else {
            return redirect('products');
        }
    }
    
    public function productDetails($productName)
    {
        $formattedProductName = str_replace('-', ' ', $productName);
        $productInfo = Products::where('productName', $formattedProductName)->where('isDeleted', 1)->first();
        if ($productInfo) {
            $productImages = ProductImages::where('productId', $productInfo->id)->where('isDeleted', 1)->get();  
           
            return view('frontend.product-details', compact('productInfo', 'productImages'));
        } else {
            return redirect('products');
        }
    }   
    
    public function investorsDesk()
    {
        return view('frontend.investors-desk');
    }
    
    public function investorsDeskReports($contentType)

    {

        $formattedContentType = str_replace('-', ' ', $contentType);



        // Get reports

        $reports = ReportsAndDownloads::where('contentType', $formattedContentType)

            ->where('isDeleted', 1)

            ->orderBy('created_at', 'desc')

            ->get();



        // Get distinct years for the dropdown filter

        $years = ReportsAndDownloads::where('contentType', $formattedContentType)

            ->where('isDeleted', 1)

            ->select(DB::raw('YEAR(created_at) as year'))

            ->distinct()

            ->orderBy('year', 'desc')

            ->pluck('year');



        // Pass both to view

        if ($reports->isNotEmpty()) {

            $contentTypeName = $formattedContentType;

            return view('frontend.investors-desk-reports', compact('contentTypeName', 'reports', 'years'));

        } else {

            return redirect()->back();

        }

    }
    
   public function downloads()
    {
        // Get downloads
        $downloads = ReportsAndDownloads::where('contentType', 'Downloads')
            ->where('isDeleted', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        // Get unique years from created_at
        $years = ReportsAndDownloads::where('contentType', 'Downloads')
            ->where('isDeleted', 1)
            ->select(DB::raw('YEAR(created_at) as year'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('frontend.downloads', compact('downloads', 'years'));
    }
    
    public function distributors()
    {
        return view('frontend.distributors');
    }
    
    public function distributorSendEmail(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
        ]);

        // Send the email
        Mail::to('sales@tapariatools.com')->send(new DistributorEmail($validatedData));

        return response()->json(['success' => true, 'message' => 'Email sent successfully!']);        
    }
    
    public function contactUs()
    {
        return view('frontend.contact-us');
    }
    
    public function privacyPolicy()
    {
        return view('frontend.privacy-policy');
    }
    
    public function termsOfService()
    {
        return view('frontend.terms-of-service');
    }
    
    public function cookiesPolicy()
    {
        return view('frontend.cookies-policy');
    }
    
    public function privacyRights()
    {
        return view('frontend.privacy-rights');
    }
    
    public function certificationPolicy()
    {
        return view('frontend.certification-policy');
    }
}

