<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Category extends Model
// {
//     use HasFactory;
//     protected $table = 'categories'; 
//     protected $fillable = ['name', 'categoryImage', 'isDeleted'];
// }/

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; 
    protected $fillable = ['name', 'categoryImage', 'isDeleted'];

    public function products()
    {
return $this->hasMany(SubCategory::class, 'categoryId')->where('isDeleted', 1);
    }
    public function subCategories()
{
    return $this->hasMany(SubCategory::class, 'categoryId')->orderBy('orderstatus', 'ASC')->where('isDeleted', 1);
}

}
