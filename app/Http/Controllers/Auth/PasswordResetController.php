<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function showForgot()
    {
        return view('auth.forgot-password');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => ['required', 'email', 'exists:users,email']]);

        $user = User::where('email', $request->email)->first();

        $otp = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->update(['otp' => $otp, 'otp_expires_at' => now()->addMinutes(5)]);

        Mail::to($user->email)->send(new OtpMail($otp, 'पासवर्ड रीसेट'));

        session(['otp_email' => $user->email, 'otp_purpose' => 'reset-password']);

        return redirect()->route('otp.verify.show')
            ->with('success', 'पासवर्ड रीसेटसाठी OTP पाठवला आहे.');
    }

    public function showReset()
    {
        if (!session('otp_verified_for_reset')) {
            return redirect()->route('password.forgot.show');
        }
        return view('auth.reset-password', ['email' => session('otp_verified_for_reset')]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $email = session('otp_verified_for_reset');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('password.forgot.show');
        }

        $user->update(['password' => Hash::make($request->password)]);
        session()->forget('otp_verified_for_reset');

        return redirect()->route('login.show')
            ->with('success', 'पासवर्ड यशस्वीरित्या बदलला. आता लॉगिन करा.');
    }
}
