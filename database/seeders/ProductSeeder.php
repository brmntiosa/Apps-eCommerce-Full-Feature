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
            'name' => 'Shirt Adidas',
            'product_category_id' => $tshirtCategoryId,
            'description' => 'meningkatkan resistensi terhadap api',
            'price' => 790.00,
            'stock' => 4,
            'status' => 'tersedia',
        ]);
        // Tambahkan produk lain jika diperlukan
    }
}
