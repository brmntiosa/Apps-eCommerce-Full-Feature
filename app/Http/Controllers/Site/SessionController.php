<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class SessionController extends Controller
{
    public function index(){

        return view('site.login.index');
    }

    function login(Request $request){
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Email tidak valid',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->role == 'user') {
                Auth::login($user);
                return redirect('/home');
            } elseif ($user->role == 'admin') {
                return redirect('/login')->withErrors('Username dan Password yang anda masukkan salah');
            }
            return redirect('home')->with('Success', 'Berhasil Login');
        } else {
            return redirect('/login')->withErrors('Username dan Password yang anda masukkan salah');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil logout. Harap Login kembali jika ingin mengakses detail Produk');

    }
}
