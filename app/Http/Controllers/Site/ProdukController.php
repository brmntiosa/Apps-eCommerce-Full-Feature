<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProdukController extends Controller
{
    public function getIndex($id)
    {
        $products = Product::find($id);

        // Tambahkan penanganan kesalahan jika produk tidak ditemukan

        return view('site.produk.index', ['Product' => $products]);
    }


}
