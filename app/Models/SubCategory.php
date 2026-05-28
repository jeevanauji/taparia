<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    
    protected $table = 'subcategories'; 
    protected $fillable = ['categoryId', 'name', 'subCategoryImage', 'isDeleted'];

    // Subcategory Model
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId','id');  // 'categoryId' is the foreign key
    }

    public function childSubCategories()
    {
        return $this->hasMany(ChildSubCategory::class, 'subCategoryId')->where('isDeleted', 1);
    }

    // Products relationship with sorting by childSubCategoryId
    public function products()
    {
        return $this->hasMany(Products::class, 'subCategoryId')
            ->where('isDeleted', 1)
            ->orderBy('childSubCategoryId', 'asc');
    }
}