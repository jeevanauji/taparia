
<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ChildSubCategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReportsAndDownloadController;
use Illuminate\Support\Facades\Artisan;


Route::get('/optimize-routes', function () {
    Artisan::call('route:clear');
    Artisan::call('route:cache');

    return "✅ Routes cleared and optimized successfully!";
});


// routes home


Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'aboutUs']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/category/{any}', [HomeController::class, 'category']);
Route::get('/sub-category/{any}', [HomeController::class, 'subCategory']);
Route::get('/child-sub-category/{any}', [HomeController::class, 'childSubCategory']);
Route::get('/product/{any}', [HomeController::class, 'productDetails']);
Route::get('/investors-desk', [HomeController::class, 'investorsDesk']);
Route::get('/investors-desk-reports/{any}', [HomeController::class, 'investorsDeskReports']);
Route::get('/downloads', [HomeController::class, 'downloads']);
Route::get('/distributors', [HomeController::class, 'distributors']);
Route::post('/distributor-send-email', [HomeController::class, 'distributorSendEmail'])->name('distributor.send.email');
Route::get('/contact-us', [HomeController::class, 'contactUs']);
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);
Route::get('/terms-of-service', [HomeController::class, 'termsOfService']);
Route::get('/cookies-policy', [HomeController::class, 'cookiesPolicy']);
Route::get('/privacy-rights', [HomeController::class, 'privacyRights']);
Route::get('/certification-policy', [HomeController::class, 'certificationPolicy']);




// routes admin
Route::prefix('admin')->group(function () {
    Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    //login
    Route::get('/', [LoginController::class, 'index'])->name('admin');
    Route::get('/login', [LoginController::class, 'index'])->name('login');    
    
    //logout
    Route::get('/logout', [LoginController::class, 'logOut'])->name('logout');    
    
    //dashboard
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    
    // category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'softDelete'])->name('category.delete');

     //subcategory
     Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');
     Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
     Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
     Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
     Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'softDelete'])->name('subcategory.delete');

     //childsubcategory
     Route::get('/childsubcategory', [ChildSubCategoryController::class, 'index'])->name('childsubcategory.index');
     Route::post('/childsubcategory/store', [ChildSubCategoryController::class, 'store'])->name('childsubcategory.store');
     Route::get('/childsubcategory/edit/{id}', [ChildSubCategoryController::class, 'edit'])->name('childsubcategory.edit');
     Route::post('/childsubcategory/update/{id}', [ChildSubCategoryController::class, 'update'])->name('childsubcategory.update');
     Route::get('/childsubcategory/delete/{id}', [ChildSubCategoryController::class, 'softDelete'])->name('childsubcategory.delete');
 
    //  products
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductsController::class, 'edit'])->name('product.edit');
    Route::get('/product-image/delete/{id}', [ProductsController::class, 'productImageSoftDelete'])->name('productImage.delete');
    Route::get('/product/info/{id}', [ProductsController::class, 'info'])->name('product.info');
    Route::post('/product/update/{id}', [ProductsController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductsController::class, 'softDelete'])->name('product.delete');
    
    // reports & downloads
    Route::get('/reports-downloads', [ReportsAndDownloadController::class, 'index'])->name('reportsAndDownloads.index');
    Route::post('/reports-downloads/store', [ReportsAndDownloadController::class, 'store'])->name('reportsAndDownloads.store');
    Route::get('/reports-downloads/edit/{id}', [ReportsAndDownloadController::class, 'edit'])->name('reportsAndDownloads.edit');
    Route::post('/reports-downloads/update/{id}', [ReportsAndDownloadController::class, 'update'])->name('reportsAndDownloads.update');
    Route::get('/reports-downloads/delete/{id}', [ReportsAndDownloadController::class, 'softDelete'])->name('reportsAndDownloads.delete');


});