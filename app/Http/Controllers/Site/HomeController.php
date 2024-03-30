<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIndex()
    {
        $products = Product::with(['productImage', 'productCategory'])
            ->where('status', 'active') // Menambahkan kondisi untuk status active
            ->get();

        $categories = ProductCategory::distinct()->get(['name']);

        return view('site.home.index', ['products' => $products, 'categories' => $categories]);
    }
    public function show($id)
    {

        $products = Product::with('productImage', 'productCategory')->where('id', $id)->first();

        return view('site.produk.index', ['products' => $products]);
    }
    public function wishlist()
    {
        $products = Product::all();
        return view('site.home.index', ['products' => $products]);
    }
}
