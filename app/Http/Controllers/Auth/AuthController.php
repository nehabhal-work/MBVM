<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // ---------- REGISTER ----------
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'max:150', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $otp = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user = User::create([
            'name'           => $validated['name'],
            'email'          => $validated['email'],
            'password'       => Hash::make($validated['password']),
            'otp'            => $otp,
            'otp_expires_at' => now()->addMinutes(5),
        ]);

        Mail::to($user->email)->send(new OtpMail($otp, 'नोंदणी पडताळणी'));

        session(['otp_email' => $user->email, 'otp_purpose' => 'register']);

        return redirect()->route('otp.verify.show')
            ->with('success', 'OTP तुमच्या ई-मेलवर पाठवला आहे.');
    }

    // ---------- LOGIN ----------
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['email' => 'ई-मेल किंवा पासवर्ड चुकीचा आहे.'])->onlyInput('email');
        }

        if (is_null($user->email_verified_at)) {
            // Not verified yet — resend OTP and push them to verify
            $otp = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $user->update(['otp' => $otp, 'otp_expires_at' => now()->addMinutes(5)]);
            Mail::to($user->email)->send(new OtpMail($otp, 'नोंदणी पडताळणी'));

            session(['otp_email' => $user->email, 'otp_purpose' => 'register']);

            return redirect()->route('otp.verify.show')
                ->with('error', 'कृपया आधी तुमचा ई-मेल OTP द्वारे पडताळा. नवीन OTP पाठवला आहे.');
        }

        Auth::login($user);
        $request->session()->regenerate();

        $redirectTo = $user->role === 'admin' ? route('members.index') : route('home');

        return redirect()->intended($redirectTo)
            ->with('success', 'यशस्वीरित्या लॉगिन झाले.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.show')->with('success', 'लॉगआऊट झाले.');
    }
}