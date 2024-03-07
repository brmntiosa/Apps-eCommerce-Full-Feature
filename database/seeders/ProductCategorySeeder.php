<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            'name' => 'T Shirt',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Pants',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Accessories',
        ]);
        DB::table('product_categories')->insert([
            'name' => 'Shoes',
        ]);
    }
}
