<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class ProductImagesSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $randomNumber = rand(1, 7);
            for ($i = 0; $i < $randomNumber; $i++) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'url' => 'storage/images/' . $product['name'] . '-' . $i . '.jpg',
                ]);
            }
        }
    }
}
