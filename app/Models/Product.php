<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'product_category_id', 'description', 'price', 'status'];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
