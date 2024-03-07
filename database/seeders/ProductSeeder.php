<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductCategory;


class ProductSeeder extends Seeder
{
    public function run()
    {
        $tshirtCategoryId = ProductCategory::where('name', 'T Shirt')->value('id');

        Product::create([
            'name' => 'Shirt Zara',
            'product_category_id' => $tshirtCategoryId,
            'description' => 'meningkatkan resistensi terhadap api',
            'price' => 990.00,
            'stock' => 9,
            'status' => 'tersedia',
        ]);
        Product::create([
            'name' => 'Shirt Uniqlo',
            'product_category_id' => $tshirtCategoryId,
            'description' => 'Uniqlo baju',
            'price' => 190.00,
            'stock' => 18,
            'status' => 'tersedia',
        ]);
        Product::create([
            'name' => 'Shirt Erigo',
            'product_category_id' => $tshirtCategoryId,
            'description' => 'erigo baju',
            'price' => 890.00,
            'stock' => 22,
            'status' => 'tersedia',
        ]);
    }
}
