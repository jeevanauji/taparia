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
    $newProducts = Products::with(['category', 'subCategory.category'])->where('isNew', 'Y')
        ->where('isDeleted', 0)
        ->whereNotNull('productImage')
        ->orderBy('id', 'asc')->get();
    $newProducts = app(\App\Services\CatalogOrderService::class)->sortProducts($newProducts);
    
    // Order categories by orderStatus
    $categories = Category::where('isDeleted', 0)
        ->orderBy('orderstatus', 'asc')
        ->get();
        

       
    
    $productsByCategory = [];
    foreach ($categories as $category) {
        $products = Products::where('categoryId', $category->id)
			->where('isNew', 'N')
            ->where('isDeleted', 0)
            ->orderBy('id', 'asc')
            ->get();
        $products = app(\App\Services\CatalogOrderService::class)->sortProducts($products)->take(6)->values();

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

        $search = preg_replace('/[^a-z0-9]/', '', $search);
        if ($search === '') {
            return response()->json([]);
        }

        $results = collect();

        /* ---------- CATEGORY ---------- */
        $categories = Category::where('isDeleted', 0)
            ->whereRaw('LOWER(REPLACE(REPLACE(REPLACE(name, " ", ""), "-", ""), "&", "")) LIKE ?', ["%{$search}%"])
            ->limit(5)
            ->get()
            ->map(function ($cat) {
                return [
                    'type'  => 'Category',
                    'label' => $cat->name,
                    'url'   => url($cat->public_url)
                ];
            });

        /* ---------- SUB CATEGORY ---------- */
        $subCategories = SubCategory::with('category')->where('isDeleted', 0)
            ->whereRaw('LOWER(REPLACE(REPLACE(REPLACE(name, " ", ""), "-", ""), "&", "")) LIKE ?', ["%{$search}%"])
            ->limit(5)
            ->get()
            ->map(function ($sub) {
                return [
                    'type'  => 'Sub Category',
                    'label' => $sub->name,
                    'url'   => url($sub->public_url)
                ];
            });

        /* ---------- PRODUCT ---------- */
        $products = Products::with(['category', 'subCategory.category'])->where('isDeleted', 0)
            ->whereRaw('LOWER(REPLACE(REPLACE(REPLACE(productName, " ", ""), "-", ""), "&", "")) LIKE ?', ["%{$search}%"])
            ->limit(5)
            ->get()
            ->map(function ($product) {
                return [
                    'type'  => 'Product',
                    'label' => $product->productName,
                    'url'   => url($product->public_url)
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
    $search = preg_replace('/[^a-z0-9]/', '', $search);

    if ($request->has('q') && $search !== '') {

        // CATEGORY (PRIORITY 1)
        $cat = Category::where('isDeleted', 0)
            ->whereRaw('LOWER(REPLACE(REPLACE(REPLACE(name, " ", ""), "-", ""), "&", "")) LIKE ?', ["%{$search}%"])
            ->first();

        if ($cat) {
            return redirect($cat->public_url);
        }

        // SUB CATEGORY (PRIORITY 2)
        $sub = SubCategory::with('category')->where('isDeleted', 0)
            ->whereRaw('LOWER(REPLACE(REPLACE(REPLACE(name, " ", ""), "-", ""), "&", "")) LIKE ?', ["%{$search}%"])
            ->first();

        if ($sub) {
            return redirect($sub->public_url);
        }

        // PRODUCT (PRIORITY 3)
        $product = Products::with(['category', 'subCategory.category'])->where('isDeleted', 0)
            ->whereRaw('LOWER(REPLACE(REPLACE(REPLACE(productName, " ", ""), "-", ""), "&", "")) LIKE ?', ["%{$search}%"])
            ->first();

        if ($product) {
            return redirect($product->public_url);
        }
    }

    /* ===============================
       🔹 DEFAULT PRODUCTS PAGE
       =============================== */

    $categories = Category::where('isDeleted', 0)
        ->orderBy('orderStatus', 'ASC')
        ->get();

    $subCategories = SubCategory::where('isDeleted', 0)
        ->orderBy('orderStatus', 'ASC')
        ->get();

    $childSubCategories = app(\App\Services\CatalogOrderService::class)->sortItems(
        'childsubcategory', ChildSubCategory::where('isDeleted', 0)->orderBy('id', 'ASC')->get()
    );

    //$products = Products::where('isDeleted', 0) ->get();
$products = app(\App\Services\CatalogOrderService::class)->sortProducts(
    Products::with(['category', 'subCategory.category'])->where('isDeleted', 0)->orderBy('id', 'ASC')->get()
);

    return view('frontend.products', compact(
        'categories',
        'subCategories',
        'childSubCategories',
        'products'
    ));
}

 
   public function category($categoryName)
{
    $categories = Category::where('isDeleted', 0)
        ->orderBy('orderStatus', 'ASC')
        ->get();

    $subCategories = SubCategory::where('isDeleted', 0)
        ->orderBy('orderStatus', 'ASC')
        ->get();

    $childSubCategories = app(\App\Services\CatalogOrderService::class)->sortItems(
        'childsubcategory', ChildSubCategory::where('isDeleted', 0)->orderBy('id', 'ASC')->get()
    );
    $products = app(\App\Services\CatalogOrderService::class)->sortProducts(
        Products::with(['category', 'subCategory.category'])->where('isDeleted', 0)->orderBy('id', 'ASC')->get()
    );
    
    // Chunk categories into groups of 5
    $categoryChunks = $categories->chunk(5);
    $totalCategories = $categories->count();
    
    $categoryId = $categories->first(
        fn ($category) => \Illuminate\Support\Str::slug($category->name) === $categoryName
    );

    if ($categoryId) {
        if (request()->is('category/*')) {
            return redirect($categoryId->public_url);
        }
        $pageType = 'category';
        $subCategoriesByCategory = SubCategory::where('categoryId', $categoryId->id)
            ->where('isDeleted', 0)
            ->orderBy('orderStatus', 'ASC')
            ->get();

        $subCategoriesWithChildSubCategories = [];
        foreach ($subCategoriesByCategory as $subCategory) {
            $childSubCategoriesBySubCategoryData = ChildSubCategory::where('subCategoryId', $subCategory->id)
                ->where('isDeleted', 0)
                ->orderBy('id', 'ASC')
                ->get(); // Removed ->take(30)
            $childSubCategoriesBySubCategoryData = app(\App\Services\CatalogOrderService::class)
                ->sortItems('childsubcategory', $childSubCategoriesBySubCategoryData);

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
            'categoryId',
            'subCategoriesByCategory',
            'subCategoriesWithChildSubCategories',
            'categoryChunks',
            'totalCategories',
            'pageType'
        ));
    } else {
        return redirect('products');
    }
}

    public function subCategory($subCategoryName)
    {
        $subCategoryData = SubCategory::where('isDeleted', 0)->get()->first(
            fn ($subCategory) => \Illuminate\Support\Str::slug($subCategory->name) === $subCategoryName
        );

        if (!$subCategoryData) {
            return redirect('products');
        }

        if (request()->is('sub-category/*')) {
            return redirect($subCategoryData->public_url);
        }

        return $this->renderSubCategoryPage($subCategoryData);
    }

    public function nestedSubCategory($categorySlug, $subCategorySlug)
    {
        $category = Category::where('isDeleted', 0)->get()->first(
            fn ($item) => \Illuminate\Support\Str::slug($item->name) === $categorySlug
        );

        if (!$category) {
            return redirect('products');
        }

        $subCategory = SubCategory::where('categoryId', $category->id)->where('isDeleted', 0)->get()->first(
            fn ($item) => \Illuminate\Support\Str::slug($item->name) === $subCategorySlug
        );

        return $subCategory
            ? $this->renderSubCategoryPage($subCategory)
            : redirect('products');
    }

    private function renderSubCategoryPage(SubCategory $subCategoryData)
    {
        $categories = Category::where('isDeleted', 0)
            ->orderBy('orderStatus', 'ASC')
            ->get();

        $subCategories = SubCategory::where('isDeleted', 0)
            ->orderBy('orderStatus', 'ASC')
            ->get();

        $childSubCategories = app(\App\Services\CatalogOrderService::class)->sortItems(
            'childsubcategory', ChildSubCategory::where('isDeleted', 0)->orderBy('id', 'asc')->get()
        );
        $products = app(\App\Services\CatalogOrderService::class)->sortProducts(
            Products::with(['category', 'subCategory.category'])->where('isDeleted', 0)->orderBy('id', 'ASC')->get()
        );
        
        // Chunk categories into groups of 5
        $categoryChunks = $categories->chunk(5);
        $totalCategories = $categories->count();
        
        if ($subCategoryData) {
            $categoryName = Category::where('id', $subCategoryData->categoryId)->where('isDeleted', 0)->first();            

            $childSubCategoriesWithProducts = [];

            $childSubCategoriesBySubCategory = ChildSubCategory::where('subCategoryId', $subCategoryData->id)
                ->where('isDeleted', 0)
                ->orderBy('id', 'ASC')
                ->get();
            $childSubCategoriesBySubCategory = app(\App\Services\CatalogOrderService::class)
                ->sortItems('childsubcategory', $childSubCategoriesBySubCategory);

            // Some subcategories contain products directly without child subcategories.
            $productsBySubCategory = Products::with(['category', 'subCategory.category'])->where('subCategoryId', $subCategoryData->id)
                ->where('isDeleted', 0)
                ->orderBy('id', 'ASC')
                ->get();
            $productsBySubCategory = app(\App\Services\CatalogOrderService::class)->sortProducts($productsBySubCategory);

            // Keep every product listed under this subcategory visible, even when
            // its child subcategory link is missing or points elsewhere.
            $childSubCategoryIds = $childSubCategoriesBySubCategory->pluck('id');
            $productsWithoutMatchingChildSubCategory = $productsBySubCategory
                ->filter(fn ($product) => !$childSubCategoryIds->contains((int) $product->childSubCategoryId))
                ->values();

            foreach ($childSubCategoriesBySubCategory as $childSubCategory) {
                $productsData = Products::with(['category', 'subCategory.category'])->where('childSubCategoryId', $childSubCategory->id)
                    ->where('subCategoryId', $subCategoryData->id)
                    ->where('isDeleted', 0)
                    ->orderBy('id', 'ASC')
                    ->get();
                $productsData = app(\App\Services\CatalogOrderService::class)->sortProducts($productsData);

                $childSubCategoriesWithProducts[] = [
                    'childSubCategory' => $childSubCategory,
                    'productsBychildSubCategory' => $productsData,
                ];
            }
            $pageType = 'subcategory';
            return view('frontend.products', compact('categories', 'subCategories', 'childSubCategories', 'products', 'categoryName', 'subCategoryData', 'childSubCategoriesWithProducts', 'productsBySubCategory', 'productsWithoutMatchingChildSubCategory', 'categoryChunks', 'totalCategories', 'pageType'));
        } else {
            return redirect('products');
        }
    }
    
    public function childSubCategory($childSubCategoryName)
    {
        $categories = Category::where('isDeleted', 0)
            ->orderBy('orderStatus', 'ASC')
            ->get();

        $subCategories = SubCategory::where('isDeleted', 0)
            ->orderBy('orderStatus', 'ASC')
            ->get();
        $childSubCategories = app(\App\Services\CatalogOrderService::class)->sortItems(
            'childsubcategory', ChildSubCategory::where('isDeleted', 0)->orderBy('id', 'ASC')->get()
        );
        $products = app(\App\Services\CatalogOrderService::class)->sortProducts(
            Products::with(['category', 'subCategory.category'])->where('isDeleted', 0)->orderBy('id', 'ASC')->get()
        );

        // Chunk categories into groups of 5
        $categoryChunks = $categories->chunk(5);
        $totalCategories = $categories->count();

        $childSubCategoryData = $childSubCategories->first(
            fn ($childSubCategory) => \Illuminate\Support\Str::slug($childSubCategory->name) === $childSubCategoryName
        );
        if ($childSubCategoryData) {
            $productsByChildSubCategory = Products::with(['category', 'subCategory.category'])
                ->where('childSubCategoryId', $childSubCategoryData->id)->where('isDeleted', 0)
                ->orderBy('id', 'ASC')->get();
            $productsByChildSubCategory = app(\App\Services\CatalogOrderService::class)->sortProducts($productsByChildSubCategory);
            $categoryName = Category::where('id', $childSubCategoryData->categoryId)->where('isDeleted', 0)->first();
            $subCategoryName = SubCategory::where('id', $childSubCategoryData->subCategoryId)->where('isDeleted', 0)->first();
            $pageType = 'child-subcategory';
            return view('frontend.products', compact('categories', 'subCategories', 'childSubCategories', 'products', 'categoryName', 'subCategoryName', 'childSubCategoryData', 'productsByChildSubCategory', 'categoryChunks', 'totalCategories', 'pageType'));
        } else {
            return redirect('products');
        }
    }
    
    public function productDetails($productName)
    {
        // Preserve decimal points in canonical URLs so names such as 0.50 and 050
        // remain distinct. Fall back to the older plain slug format for existing links.
        $activeProducts = Products::with(['category', 'subCategory.category'])->where('isDeleted', 0)->get();
        $productInfo = $activeProducts->first(fn ($product) =>
            \Illuminate\Support\Str::slug(str_replace('.', '-dot-', $product->productName)) === $productName
        ) ?? $activeProducts->first(fn ($product) =>
            \Illuminate\Support\Str::slug($product->productName) === $productName
        );
        if (!$productInfo) {
            return redirect('products');
        }

        if (!request()->is('product/*')) {
            return $this->renderProductDetails($productInfo);
        }

        return str_starts_with($productInfo->public_url, 'product/')
            ? $this->renderProductDetails($productInfo)
            : redirect($productInfo->public_url);
    }   

    public function nestedProductDetails($categorySlug, $subCategorySlug, $productSlug)
    {
        $productInfo = Products::with(['category', 'subCategory.category'])
            ->where('isDeleted', 0)
            ->get()
            ->first(function ($product) use ($categorySlug, $subCategorySlug, $productSlug) {
                $parentCategory = $product->subCategory?->category;

                return $parentCategory
                    && $product->subCategory
                    && \Illuminate\Support\Str::slug($parentCategory->name) === $categorySlug
                    && \Illuminate\Support\Str::slug($product->subCategory->name) === $subCategorySlug
                    && \Illuminate\Support\Str::slug(str_replace('.', '-dot-', $product->productName)) === $productSlug;
            });

        return $productInfo ? $this->renderProductDetails($productInfo) : redirect('products');
    }

    private function renderProductDetails(Products $productInfo)
    {
        $productImages = ProductImages::where('productId', $productInfo->id)->where('isDeleted', 0)->get();
        return view('frontend.product-details', compact('productInfo', 'productImages'));
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

            ->where('isDeleted', 0)

            ->orderBy('created_at', 'asc')

            ->paginate(15);


        // Get distinct years for the dropdown filter

        $years = ReportsAndDownloads::where('contentType', $formattedContentType)

            ->where('isDeleted', 0)

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
        ->where('isDeleted', 0)
        ->orderBy('contentName', 'asc')
        ->paginate(15);  // Pagination (15 items per page)

    // Get unique years from created_at
    $years = ReportsAndDownloads::where('contentType', 'Downloads')
        ->where('isDeleted', 0)
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

    $product = Products::with(['category', 'subCategory.category'])->where('productName', 'LIKE', "%{$query}%")
        ->where('isDeleted', 0)
        ->first();

    if ($product) {
        return response()->json([
            'found' => true,
            'redirect_url' => url($product->public_url)
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
    $exact = Products::with(['category', 'subCategory.category'])->where('isDeleted', 0)
        ->where('productName', 'LIKE', $query)
        ->first();

    if ($exact) {
        return response()->json([
            'found' => true,
            'redirect_url' => url($exact->public_url)
        ]);
    }

    // ✅ Suggestions
    $products = Products::with(['category', 'subCategory.category'])->where('isDeleted', 0)
        ->where('productName', 'LIKE', "%{$query}%")
        ->limit(5)
        ->get();

    $formatted = $products->map(function ($item) {
        return [
            'name' => $item->productName,
            'slug' => \Illuminate\Support\Str::slug(str_replace('.', '-dot-', $item->productName)),
            'image' => $item->productImage,
            'url' => url($item->public_url)
        ];
    });

    return response()->json([
        'found' => false,
        'results' => $formatted
    ]);
}

}

