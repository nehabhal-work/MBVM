<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    public function show()
    {
        if (!session('otp_email')) {
            return redirect()->route('login.show');
        }
        return view('auth.verify-otp', ['email' => session('otp_email')]);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $email = session('otp_email');
        $purpose = session('otp_purpose', 'register');

        $user = User::where('email', $email)->first();

        if (!$user || $user->otp !== $request->otp) {
            return back()->withErrors(['otp' => 'चुकीचा OTP आहे.']);
        }

        if (now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'OTP ची मुदत संपली आहे. नवीन OTP मागवा.']);
        }

        // Purpose: register -> verify email + auto-login
        if ($purpose === 'register') {
            $user->update([
                'email_verified_at' => now(),
                'otp' => null,
                'otp_expires_at' => null,
            ]);

            Auth::login($user);
            session()->forget(['otp_email', 'otp_purpose']);

            $redirectRoute = $user->role === 'admin' ? 'members.index' : 'home';

            return redirect()->route($redirectRoute)
                ->with('success', 'नोंदणी यशस्वी! तुम्ही आता लॉगिन आहात.');
        }

        // Purpose: reset-password -> let them set a new password
        session(['otp_verified_for_reset' => $email]);
        session()->forget(['otp_email', 'otp_purpose']);

        return redirect()->route('password.reset.show')
            ->with('success', 'OTP पडताळला. आता नवीन पासवर्ड सेट करा.');
    }

    public function resend(Request $request)
    {
        $email = session('otp_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('login.show');
        }

        $otp = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->update(['otp' => $otp, 'otp_expires_at' => now()->addMinutes(5)]);

        Mail::to($user->email)->send(new OtpMail($otp, 'नोंदणी पडताळणी'));

        return back()->with('success', 'नवीन OTP पाठवला आहे.');
    }
}