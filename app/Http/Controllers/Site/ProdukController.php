<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function getIndex($id)
    {
        $products = Product::with('productImage', 'productCategory')->get();

        dd($products);
        return view('site.produk.index', ['products' => $products]);

    }
}
