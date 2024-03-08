<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProdukController extends Controller
{
    public function getIndex($id)
    {
        $products = Product::with('productImage')->get();
        return view('site.produk.index', ['products' => $products]);
    }
}
