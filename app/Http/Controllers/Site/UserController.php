<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\EmailVerification;
use App\Models\OneTimePassword;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mail;

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
            'role' => 'string|in:user,admin',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Jika pengguna belum terdaftar, buat pengguna baru
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->save();

            // Create OneTimePassword record
            $this->createOneTimePassword($user);

            // Redirect ke halaman verifikasi
            return redirect("/verification/" . $user->id);
        } else {
            // Jika pengguna sudah terdaftar
            if ($user->is_verified == 0) {
                // Jika belum diverifikasi, kirim OTP dan arahkan ke halaman verifikasi
                $this->sendOtp($user);
                return redirect("/verification/" . $user->id);
            } else {
                // Jika sudah diverifikasi, berikan tanggapan atau arahkan ke halaman selanjutnya
                return redirect("/next-page")->with('status', 'User already registered and verified.');
            }
        }
    }
    public function loadLogin()
    {
        if (Auth::user()) {
            return redirect('/dashboard');
        }
        return view('site.login.index');
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
                'valid_until' => now()->addMinutes(5), // You can adjust the validity period
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

        if ($userData instanceof \Illuminate\Contracts\Auth\Authenticatable) {
            $request->session()->put('custom_login', true);
            Auth::login($userData);

            if ($userData->role == 'user') {
                return redirect('/home');
            } elseif ($userData->role == 'admin') {
                return redirect('/admin');
            }
        }
        return redirect('/home');
    }

    public function loadDashboard()
    {
        if (Auth::user()) {
            $products = Product::with('productImage')->get();
            return view('site.home.index', ['products' => $products]);
        }
        return redirect('/');
    }

    public function verification($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user || $user->is_verified == 1) {
            return redirect('/');
        }
        $email = $user->email;

        $this->sendOtp($user);

        return view('verification', compact('email'));
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
        // Mark the OTP as used
        $otpData->update(['is_used' => true]);

        // Mark the user as verified
        User::where('id', $user->id)->update(['is_verified' => 1]);

        return response()->json(['success' => true, 'msg' => 'Mail has been verified']);
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
            'valid_until' => now()->addMinutes(5), // You can adjust the validity period
        ]);

        // Send OTP via email (you can modify this part based on your email sending logic)
        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';
        $data['body'] = 'Your OTP is: ' . $otp;

        Mail::send('mailVerification', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
    }
}
