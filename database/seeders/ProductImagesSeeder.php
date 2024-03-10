<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductImagesSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $randomNumber = rand(1, 4);
            for ($i = 0; $i < $randomNumber; $i++) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'url' => 'storage/images/' . $product['name'] . '-' . $i . '.jpg',
                ]);
            }
        }
    }
}
