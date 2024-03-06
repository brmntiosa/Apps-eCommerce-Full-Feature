<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return view('site.home.index', ['products' => $products]);
    }
}
