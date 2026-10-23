<?php

namespace App\Models;

use Illuminate\Support\Str;
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
    protected $fillable = ['name', 'categoryImage', 'isDeleted', 'orderStatus'];

    public function products()
    {
return $this->hasMany(SubCategory::class, 'categoryId')->where('isDeleted', 0);
    }
    public function subCategories()
{
    return $this->hasMany(SubCategory::class, 'categoryId')->where('isDeleted', 0)->orderBy('orderStatus', 'ASC')->orderBy('id', 'ASC');
}

    public function getPublicUrlAttribute(): string
    {
        return Str::slug($this->name);
    }

}
