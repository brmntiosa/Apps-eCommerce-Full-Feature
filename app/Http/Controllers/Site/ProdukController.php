<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function getIndex($id)
    {
        $products = Product::with('productImage', 'productCategory')->get();

        return view('site.produk.index', ['products' => $products]);
    }
}
