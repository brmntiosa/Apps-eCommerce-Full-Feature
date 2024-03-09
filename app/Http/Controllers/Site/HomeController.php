<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function getIndex()
    {
        $products = Product::with('productImage')->get();
        return view('site.home.index', ['products' => $products]);
    }
    public function show($id)
    {
        $products = Product::with('productImage')->where('id', $id)->first();
        return view('site.produk.index', ['products' => $products]);
    }
    public function wishlist()
    {
        $products = Product::all();
        return view('site.home.index', ['products' => $products]);
    }
}
