<?php

namespace App\Http\Controllers\site;

use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        $wishlists = Wishlist::with('user', 'product')->get();

        return view('site.wishlist.index', compact('wishlists'));
    }

    public function addToWishlist(Request $request)
    {
        // dd($request->all());
        // Validasi request jika diperlukan

        $wishlists = Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->input('product_id'),

        ]);

        return redirect()->route('site.wishlist.index')->with('success', 'Product added to wishlist successfully');
    }

    public function removeFromWishlist($id)
    {
        Wishlist::findOrFail($id)->delete();

        return redirect()->route('site.wishlist.index')->with('success', 'Product removed from wishlist successfully');
    }
}
