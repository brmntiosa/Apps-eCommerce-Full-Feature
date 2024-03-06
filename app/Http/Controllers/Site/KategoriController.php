<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class KategoriController extends Controller
{
    public function getIndex(){

        $products = Product::all();
        return view('site.kategori.index', ['products' => $products]);
    }
}
