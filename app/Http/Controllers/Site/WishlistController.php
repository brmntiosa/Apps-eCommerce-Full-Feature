<?php

namespace App\Http\Controllers\site;

use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        // Mengambil wishlist berdasarkan ID pengguna yang sedang login
        $userId = Auth::id();
        $wishlists = Wishlist::with('user', 'product')
            ->where('user_id', $userId)
            ->get();

        return view('site.wishlist.index', compact('wishlists'));
    }

    public function addToWishlist(Request $request)
    {
        // Validasi request jika diperlukan

        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Membuat wishlist dengan menggunakan ID pengguna
        $wishlist = Wishlist::create([
            'user_id' => $userId,
            'product_id' => $request->input('product_id'),
        ]);

        return redirect()->route('site.wishlist.index')->with('success', 'Product added to wishlist successfully');
    }

    public function removeFromWishlist($id)
    {
        // Menghapus wishlist berdasarkan ID
        Wishlist::findOrFail($id)->delete();

        return redirect()->route('site.wishlist.index')->with('success', 'Product removed from wishlist successfully');
    }
}
