<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;
    
    protected $table = 'subcategories'; 
    protected $fillable = ['categoryId', 'name', 'subCategoryImage', 'isDeleted', 'orderStatus'];

    // Subcategory Model
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId','id');  // 'categoryId' is the foreign key
    }

    public function childSubCategories()
    {
        return $this->hasMany(ChildSubCategory::class, 'subCategoryId')->where('isDeleted', 0);
    }

    // Products relationship with sorting by childSubCategoryId
    public function products()
    {
        return $this->hasMany(Products::class, 'subCategoryId')
            ->where('isDeleted', 0)
            ->orderBy('childSubCategoryId', 'asc')
            ->orderBy('id', 'asc');
    }

    public function getPublicUrlAttribute(): string
    {
        $categorySlug = $this->category ? Str::slug($this->category->name) : '';
        return trim($categorySlug . '/' . Str::slug($this->name), '/');
    }
}
