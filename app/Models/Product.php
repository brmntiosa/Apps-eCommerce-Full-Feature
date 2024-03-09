<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


// app\Models\Product.php

class Product extends Model
{
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
