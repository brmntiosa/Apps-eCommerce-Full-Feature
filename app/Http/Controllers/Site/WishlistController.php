<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        $userId = Auth::id();
        $wishlists = Wishlist::with('user', 'product')
            ->where('user_id', $userId)
            ->get();

        return view('site.wishlist.index', compact('wishlists'));
    }

    public function addToWishlist(Request $request)
    {
        $userId = Auth::id();
        $wishlist = Wishlist::create([
            'user_id' => $userId,
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
