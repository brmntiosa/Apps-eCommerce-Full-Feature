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
            'email'=>'required',
            'password'=>'required'

        ], [
            'email.required'=>'Email wajib di isi',
            'password.required'=>'passwrod wajib di isi',
        ]);

        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($infologin)){

            if(Auth::user()->role == 'user'){
                return redirect('/home');
            } elseif(Auth::user()->role == 'admin'){
                return redirect('/login')->withErrors('Username dan Password yang anda masukkan salah');
            }
            return redirect('home')->with('Success','Berhasil Login');
        } else {
            return redirect('/login')->with('Success','Berhasil Login');
        }

    }

    function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Berhasil logout. Harap Login kembali jika ingin mengakses detail Produk');


    }

    function register()
    {
        return view('site.login.register');
    }
    function create(Request $request){

        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'nomor'=>'required|min:5',
            'password'=>'required|min:5'


        ], [
            'name.required'=>'nama wajib di isi',
            'email.required'=>'Email wajib di isi',
            'email.email'=>'email tidak valid',
            'email.unique'=>'email sudah terdaftar',
            'password.required'=>'passwrod wajib di isi',
            'password.min'=>'min 5 karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nomor' => $request->nomor,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set peran menjadi 'user'
        ];
        User::create($data);

        $infologin=[
            'email'=>$request->email,
            'nomor'=>$request->nomor,
            'password'=>$request->password

        ];

        if(Auth::attempt($infologin)){
            return redirect('home')->with('Success','Berhasil Login');
        } else {
            return 'gagal';
        }

    }
}
