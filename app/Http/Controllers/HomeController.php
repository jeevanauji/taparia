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
        ->orderBy('created_at', 'asc')
        ->get();
    
    // Order categories by orderStatus
    $categories = Category::where('isDeleted', 1)
        ->orderBy('orderstatus', 'asc')
        ->get();
        

       
    
    $productsByCategory = [];
    foreach ($categories as $category) {
        $products = Products::where('categoryId', $category->id)
			->where('isNew', 'N')
            ->where('isDeleted', 1)
            ->orderBy('created_at', 'asc')
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
	
public function products(Request $request)
{
    /* ===============================
       🔹 AJAX SEARCH SUGGESTIONS
       =============================== */
    if ($request->ajax()) {

        $search = strtolower(trim($request->q));

        if ($search === '') {
            return response()->json([]);
        }

        // Normalize search
        $search = str_replace('-', ' ', $search);
        $search = preg_replace('/\s+/', ' ', $search);

        $results = collect();

        /* ---------- CATEGORY ---------- */
        $categories = Category::where('isDeleted', 1)
            ->whereRaw('LOWER(REPLACE(name, "-", " ")) LIKE ?', ["%{$search}%"])
            ->limit(5)
            ->get()
            ->map(function ($cat) {
                return [
                    'type'  => 'Category',
                    'label' => $cat->name,
                    'url'   => url('/category/' . str_replace(' ', '-', strtolower($cat->name)))
                ];
            });

        /* ---------- SUB CATEGORY ---------- */
        $subCategories = SubCategory::where('isDeleted', 1)
            ->whereRaw('LOWER(REPLACE(name, "-", " ")) LIKE ?', ["%{$search}%"])
            ->limit(5)
            ->get()
            ->map(function ($sub) {
                return [
                    'type'  => 'Sub Category',
                    'label' => $sub->name,
                    'url'   => url('/sub-category/' . str_replace(' ', '-', strtolower($sub->name)))
                ];
            });

        /* ---------- PRODUCT ---------- */
        $products = Products::where('isDeleted', 1)
            ->whereRaw('LOWER(REPLACE(productName, "-", " ")) LIKE ?', ["%{$search}%"])
            ->limit(5)
            ->get()
            ->map(function ($product) {
                return [
                    'type'  => 'Product',
                    'label' => $product->productName,
                    'url'   => url('/product/' . str_replace(' ', '-', strtolower($product->productName)))
                ];
            });

        return response()->json(
            $results
                ->merge($categories)
                ->merge($subCategories)
                ->merge($products)
                ->values()
        );
    }

    /* ===============================
       🔹 NORMAL SEARCH FLOW
       =============================== */

    $search = strtolower(trim($request->q));
    $search = str_replace('-', ' ', $search);
    $search = preg_replace('/\s+/', ' ', $search);

    if ($request->has('q') && $search !== '') {

        // CATEGORY (PRIORITY 1)
        $cat = Category::where('isDeleted', 1)
            ->whereRaw('LOWER(REPLACE(name, "-", " ")) LIKE ?', ["%{$search}%"])
            ->first();

        if ($cat) {
            return redirect('/category/' . str_replace(' ', '-', strtolower($cat->name)));
        }

        // SUB CATEGORY (PRIORITY 2)
        $sub = SubCategory::where('isDeleted', 1)
            ->whereRaw('LOWER(REPLACE(name, "-", " ")) LIKE ?', ["%{$search}%"])
            ->first();

        if ($sub) {
            return redirect('/sub-category/' . str_replace(' ', '-', strtolower($sub->name)));
        }

        // PRODUCT (PRIORITY 3)
        $product = Products::where('isDeleted', 1)
            ->whereRaw('LOWER(REPLACE(productName, "-", " ")) LIKE ?', ["%{$search}%"])
            ->first();

        if ($product) {
            return redirect('/product/' . str_replace(' ', '-', strtolower($product->productName)));
        }
    }

    /* ===============================
       🔹 DEFAULT PRODUCTS PAGE
       =============================== */

    $categories = Category::where('isDeleted', 1)
        ->orderBy('orderStatus', 'ASC')
        ->get();

    $subCategories = SubCategory::where('isDeleted', 1)
        ->orderBy('orderStatus', 'ASC')
        ->get();

    $childSubCategories = ChildSubCategory::where('isDeleted', 1)->get();

    //$products = Products::where('isDeleted', 1) ->get();
$products = Products::where('isDeleted', 1)
    ->orderBy('childSubCategoryId', 'ASC')
    ->orderBy('id', 'ASC')
    ->get();

    return view('frontend.products', compact(
        'categories',
        'subCategories',
        'childSubCategories',
        'products'
    ));
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

        $childSubCategories = ChildSubCategory::where('isDeleted', 1)->orderBy('Id', 'asc')->get();
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

            ->orderBy('created_at', 'asc')

            ->paginate(15);


        // Get distinct years for the dropdown filter

        $years = ReportsAndDownloads::where('contentType', $formattedContentType)

            ->where('isDeleted', 1)

            ->select(DB::raw('YEAR(created_at) as year'))

            ->distinct()

            ->orderBy('year', 'asc')

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
    // Get paginated downloads (15 per page)
    $downloads = ReportsAndDownloads::where('contentType', 'Downloads')
        ->where('isDeleted', 1)
        ->orderBy('contentName', 'asc')
        ->paginate(15);  // Pagination (15 items per page)

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
	
public function liveSearch(Request $request)
{
    $query = trim($request->q);

    if ($query === '') {
        return response()->json(['found' => false]);
    }

    $product = Products::where('name', 'LIKE', "%{$query}%")
        ->where('isDeleted', 1)
        ->first();

    if ($product) {
        return response()->json([
            'found' => true,
            'redirect_url' => url('/product/' . $product->slug)
        ]);
    }

    return response()->json(['found' => false]);
}

public function ajaxSearch(Request $request)
{
    $query = trim($request->q);

    if ($query === '') {
        return response()->json([
            'found' => false,
            'results' => []
        ]);
    }

    // ✅ Exact match → auto redirect
    $exact = Products::where('isDeleted', 1)
        ->where('name', 'LIKE', $query)
        ->first();

    if ($exact) {
        return response()->json([
            'found' => true,
            'redirect_url' => url('/product/' . $exact->slug)
        ]);
    }

    // ✅ Suggestions
    $products = Products::where('isDeleted', 1)
        ->where('name', 'LIKE', "%{$query}%")
        ->limit(5)
        ->get();

    $formatted = $products->map(function ($item) {
        return [
            'name' => $item->name,
            'slug' => $item->slug,
            'image' => $item->image, // adjust field if needed
            'url' => url('/product/' . $item->slug)
        ];
    });

    return response()->json([
        'found' => false,
        'results' => $formatted
    ]);
}

}

