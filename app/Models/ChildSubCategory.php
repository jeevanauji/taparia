<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildSubCategory extends Model
{
    use HasFactory;
    
    protected $table = 'childsubcategories'; 
    protected $fillable = ['categoryId', 'subCategoryId', 'name', 'childSubCategoryImage', 'isDeleted'];    
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId','id');  // 'categoryId' is the foreign key
    }    
    
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCategoryId','id');  // 'subCategoryId' is the foreign key
    }    
}
