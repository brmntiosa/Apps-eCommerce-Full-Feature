<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request; // Import kelas Request

class KategoriController extends Controller
{
    public function getIndex(Request $request) // Tambahkan parameter $request di sini
    {
        $searchTerm = $request->input('search');
        $categories = ProductCategory::orderBy('name')->get();

        // Periksa apakah ada pencarian atau tidak
        if ($searchTerm) {
            $products = Product::where('name', 'like', '%' . $searchTerm . '%')->get();
        } else {
            $products = Product::all();
        }

        return view('site.kategori.index', ['categories' => $categories, 'products' => $products]);
    }
}
