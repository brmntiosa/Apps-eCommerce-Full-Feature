<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImages extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            $imageUrls = array_map(
                fn($i) => 'global/landingpage/images' . $i . '.jpg',
                range(1, 5)
            );

            $data = array_map(
                fn($url) => ['product_id' => $product->id, 'url' => $url],
                $imageUrls
            );

            DB::table('product_images')->insert($data);
        }
    }
}
