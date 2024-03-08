<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function get_login()
   {
    return view('site.login.index');
   }

   public function get_register()
   {
    return view('site.login.register');
   }

   public function post_login(Request $request)
   {

   }
   public function post_register(Request $request)
   {
    $request->validate([
        'name' => 'required',
        'email' => 'required',

    ]);



    $user = User::create($request->except(['_token']));

    event(new Registered($user));

    auth()->login($user);

    return redirect()->route('verification.notice')->with('success', 'Registration success. Please check your email for verification.');
   }
}
