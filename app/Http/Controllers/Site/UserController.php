<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailVerification;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mail;

class UserController extends Controller
{
    //
    public function loadRegister()
    {
        return view('site.login.register');
    }

    public function studentRegister(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'role' => 'string|in:user,admin', // Validasi role agar hanya user atau admin
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role; // Tambahkan baris ini untuk menyimpan role
        $user->save();

        return redirect("/verification/".$user->id);
    }

    public function loadLogin()
    {
        if(Auth::user()){
            return redirect('/dashboard');
        }
        return view('site.login.index');
    }

    public function sendOtp($user)
    {
        $otp = rand(100000,999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
            'email' => $user->email,
            'otp' => $otp,
            'created_at' => $time
            ]
        );

        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';

        $data['body'] = 'Your OTP is:- '.$otp;

        Mail::send('mailVerification',['data'=>$data],function($message) use ($data){
            $message->to($data['email'])->subject($data['title']);
        });
    }

    public function userLogin(Request $request)
{
    $request->validate([
        'email' => 'required',
    ]);

    $userData = User::where('email', $request->email)->first();

    if ($userData && $userData->is_verified == 0) {
        $this->sendOtp($userData);
        return redirect("/verification/" . $userData->id);
    }

    // Pastikan user yang diberikan ke Auth::login adalah instance Authenticatable
    if ($userData instanceof \Illuminate\Contracts\Auth\Authenticatable) {
        // Set custom data to the session
        $request->session()->put('custom_login', true);
        Auth::login($userData);

        // Cek peran pengguna setelah login
        if ($userData->role == 'user') {
            return redirect('/home');
        } elseif ($userData->role == 'admin') {
            return redirect('/admin');
        }
    }

    return redirect('/home'); // Redirect default jika peran tidak dikenali
}

    public function loadDashboard()
    {
        if(Auth::user()){
            $products = Product::with('productImage')->get();
            return view('site.home.index', ['products' => $products]);
        }
        return redirect('/');
    }

    public function verification($id)
    {
        $user = User::where('id',$id)->first();
        if(!$user || $user->is_verified == 1){
            return redirect('/');
        }
        $email = $user->email;

        $this->sendOtp($user);//OTP SEND

        return view('verification',compact('email'));
    }

    public function verifiedOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('otp',$request->otp)->first();
        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                return response()->json(['success' => true,'msg'=> 'Mail has been verified']);
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }

    public function resendOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('email',$request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
            return response()->json(['success' => false,'msg'=> 'Please try after some time']);
        }
        else{

            $this->sendOtp($user);//OTP SEND
            return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
        }

    }
}
