<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator; // ✅ Import this
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->useStoragePath(base_path('storage'));

        Schema::defaultStringLength(191);

        // ✅ Enable Bootstrap 5 pagination styles
        Paginator::useBootstrapFive();

        // ✅ Only run DB-related code if NOT in console (artisan commands)
        if (!app()->runningInConsole()) {
            try {
                // Set SQL mode (ignore ONLY_FULL_GROUP_BY issue)
                DB::statement(
                    "SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));"
                );

                // ✅ View composer to pass $categories to the header
                View::composer('frontend.layout.header', function ($view) {
                   
                    $categories = Category::with([

                        // LEVEL 2: Sub Categories
                        'subCategories' => function ($q) {
                            $q->where('isDeleted', 0)
                              ->orderBy('orderStatus', 'ASC');
                        },

                        // LEVEL 3: Products (FINAL ORDER FIX)
                        'subCategories.products' => function ($q) {
                            $q->where('isDeleted', 0)
                              ->with(['category', 'subCategory.category'])
                              ->orderBy('childSubCategoryId', 'ASC')
                              ->orderBy('id', 'ASC');
                        },

                       

                    ])
                    ->where('isDeleted', 0)
                    ->orderBy('orderstatus', 'ASC') // LEVEL 1: Categories
                    ->get();

                    $catalogOrder = app(\App\Services\CatalogOrderService::class);
                    foreach ($categories as $category) {
                        foreach ($category->subCategories as $subCategory) {
                            $subCategory->setRelation('products', $catalogOrder->sortProducts($subCategory->products));
                        }
                    }

                    $view->with('categories', $categories);
                });
            } catch (\Exception $e) {
                // Prevent artisan & app from breaking if DB is not ready
                // logger()->error('AppServiceProvider DB error: ' . $e->getMessage());
            }
        }
    }
}
