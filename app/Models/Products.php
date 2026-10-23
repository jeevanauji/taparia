<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Products extends Model
{
    use HasFactory;
    
    protected $table = 'products'; 
    protected $fillable = ['categoryId', 'subCategoryId', 'childSubCategoryId', 'productName', 'isNew', 'productCatalogue', 'productImage', 'productOverview', 'productHighlighting', 'productSpecifications', 'isDeleted', 'orderStatus'];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId','id');  // 'categoryId' is the foreign key
    }    
    
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCategoryId','id');  // 'subCategoryId' is the foreign key
    }
    
    public function childSubCategory()
    {
        return $this->belongsTo(ChildSubCategory::class, 'childSubCategoryId','id');  // 'childSubCategoryId' is the foreign key
    }

    public function getPublicUrlAttribute(): string
    {
        $subCategory = $this->subCategory;
        $category = $subCategory?->category ?? $this->category;
        $categorySlug = $category ? Str::slug($category->name) : null;
        $subCategorySlug = $subCategory ? Str::slug($subCategory->name) : null;
        $productSlug = Str::slug(str_replace('.', '-dot-', $this->productName));

        if ($categorySlug && $subCategorySlug) {
            return $categorySlug . '/' . $subCategorySlug . '/' . $productSlug;
        }

        return 'product/' . $productSlug;
    }
}
