<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Models\OneTimePassword;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function loadRegister()
    {
        return view('site.login.register');
    }


    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Jika pengguna belum terdaftar, buat pengguna baru
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            // Create OneTimePassword record
            $this->createOneTimePassword($user);
            // Redirect ke halaman verifikasi
            return redirect()->route('indexRegister.verification', $user->id);
        } else {
            // Jika pengguna sudah terdaftar
            if ($user->is_verified == 0) {
                // Jika belum diverifikasi, kirim OTP dan arahkan ke halaman verifikasi
                $this->sendOtp($user);
                return redirect( )->route('indexRegister.verification', $user->id);
            } else {
                // Jika sudah diverifikasi, berikan tanggapan atau arahkan ke halaman selanjutnya
              return redirect()->route('index.userLogin', $user->id);
            }
        }
    }
    public function loadLogin()
    {
        if (Auth::user()) {
            return redirect('/home');
        }
        return view('site.login.index');
    }


    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $userData = User::where('email', $request->email)->first();
        if ($userData) {
            // Periksa apakah pengguna telah diverifikasi dan memiliki OTP yang belum digunakan
            if ($userData->is_verified == 0) {
                $otpData = OneTimePassword::where('user_id', $userData->id)
                    ->where('is_used', false)
                    ->where('valid_until', '>=', now())
                    ->first();

                // Jika pengguna belum memiliki OTP yang valid, kirim OTP baru
                if (!$otpData) {
                    $this->createOneTimePassword($userData);
                }

                // Redirect ke halaman verifikasi
                return redirect()->route('indexRegister.verification', $userData->id);
            } else {
                // Jika pengguna telah diverifikasi, kirim OTP baru dan arahkan ke halaman verifikasi login
                $this->sendOtp($userData);
                return redirect()->route('indexLogin.verification', $userData->id);
            }
        } else {
            // Jika pengguna tidak ditemukan, kembalikan ke halaman login dengan pesan kesalahan
            return redirect('/')->with('error', 'User not found.');
        }
    }



    public function loadDashboard()
    {
        if (Auth::user()) {
            // Misalnya, Anda ingin menampilkan pesan "Selamat Datang" ketika pengguna berhasil login
            $welcomeMessage = 'Selamat Datang, ' . Auth::user()->name . '!';

            // Set pesan notifikasi ke dalam session
            session()->flash('success', $welcomeMessage);

            // Dapatkan produk untuk ditampilkan di halaman home
            $products = Product::with('productImage')->get();

            // Render halaman home dengan produk dan notifikasi
            return view('site.home.index', ['products' => $products]);
        }
        // Jika pengguna belum login, redirect ke halaman login
        return redirect('/');
    }

    public function verificationLoginIndex($id)
    {
        try {
            $user = User::where('id', $id)->first();
            if (!$user || $user->is_verified != 1) {
                // $this->sendOtp($user);
                return redirect('/');
            }
            $email = $user->email;
            return View::make('verification', ['user' => $user, 'email' => $email]);
        } catch (\Throwable $th) {
            dd($th);
        }

    }
    public function verificationRegisterIndex($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $email = $user->email;
            return View::make('verification', ['user' => $user, 'email' => $email]);
        } catch (\Throwable $th) {
            dd($th);
        }

    }
    public function logout()
{
    Auth::logout();
    return redirect('/')->with('success', 'You have been logged out successfully.');
}

   public function verifiedOtp(Request $request)
   {
       $user = User::where('email', $request->email)->first();
       $otpData = OneTimePassword::where('user_id', $user->id)
           ->where('otp_code', $request->otp)
           ->where('is_used', false)
           ->where('valid_until', '>=', now())
           ->first();

       if (!$otpData) {
           return response()->json(['success' => false, 'msg' => 'You entered wrong OTP or the OTP has expired']);
       } else {

           $otpData->update(['is_used' => true]);


           User::where('id', $user->id)->update(['is_verified' => 1]);


           Auth::loginUsingId($user->id);

           if ($user->role == 'user') {
               return redirect()->route('site.home.getIndex')->with('message', ['success' => true, 'msg' => 'Mail has been verified']);
           }
               return redirect()->route('site.admin.dashboardGetIndex')->with('message', ['success' => true, 'msg' => 'Mail has been verified']);
           }
       }


   public function resendOtp(Request $request)
   {
       $user = User::where('email', $request->email)->first();

       if (!$user) {
           return response()->json(['success' => false, 'msg' => 'Email not found']);
       }

       $otpData = OneTimePassword::where('user_id', $user->id)->first();

       if (!$otpData) {
           return response()->json(['success' => false, 'msg' => 'No OTP data found']);
       }

       $currentTime = time();
       $time = strtotime($otpData->valid_until);

       if ($currentTime >= $time && $time >= $currentTime - (90 + 5)) {
           return response()->json(['success' => false, 'msg' => 'Please try after some time']);
       } else {
           $this->sendOtp($user);
           return response()->json(['success' => true, 'msg' => 'OTP has been sent']);
       }
   }

    private function createOneTimePassword($user)
    {
        $otp = rand(100000, 999999);
        $time = time();

        OneTimePassword::create([
            'user_id' => $user->id,
            'otp_code' => $otp,
            'is_used' => false,
            'valid_until' => $time,
        ]);


        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';
        $data['body'] = 'Your OTP is: ' . $otp;

        Mail::send('mailVerification', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
    }
    private function sendOtp($user)
    {
        $otp = rand(100000, 999999);
        $time = time();

        OneTimePassword::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'otp_code' => $otp,
                'is_used' => false,
                'valid_until' => now()->addMinutes(1), // You can adjust the validity period
            ]
        );

        // Send OTP via email (you can modify this part based on your email sending logic)
        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';
        $data['body'] = 'Your OTP is: ' . $otp;

        Mail::send('mailVerification', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
    }

}

