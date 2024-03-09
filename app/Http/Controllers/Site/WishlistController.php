<?php

namespace App\Http\Controllers\site;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function getIndex()
    {
        $user = Auth::user();

        if ($user) {
            $products = $user->wishlist;
            return view('site.wishlist.index', ['products' => $products]);
        }

        return redirect('/login'); // atau sesuaikan dengan rute login Anda
    }

    public function addToWishlist(Product $product)
    {
        $user = Auth::user();

        if ($user) {
            $user->wishlist->attach($product->id);
            return redirect()->route('wishlist.index');
        }

        return redirect('/login'); // atau sesuaikan dengan rute login Anda
    }
}
