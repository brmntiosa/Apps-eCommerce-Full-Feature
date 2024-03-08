<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function notice()
    {
        return "Mohon untuk melakukan Verifikasi Terlebih dahulu";
    }
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        $products = Product::with('productImage')->get();
        return view('site.home.index', ['products' => $products]);
    }

    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return "verifikasi email telah dikirim";
    }
}
