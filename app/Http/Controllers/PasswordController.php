<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class PasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        if (Auth::guard('visitor')->check()) {
            return redirect()->route('dashboard');
        }
        if (Auth::guard('web')->check()) {
            return redirect()->route('admins.dashboard');
        }
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $email = $request->email;
        // Check if the email exists in the visitors table
        $visitor = Visitor::where('email', $email)->first();
        if (!$visitor) {
            return back()->withErrors(['email' => 'Email does not exist in our records.']);
        }
        Log::info("Sending reset link to: $email");
        $status = Password::broker('visitors')->sendResetLink(['email' => $email]);
        Log::info("Password broker status: $status");
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm($token)
    {
        if (Auth::guard('visitor')->check()) {
            return redirect()->route('dashboard');
        }
        if (Auth::guard('web')->check()) {
            return redirect()->route('admins.dashboard');
        }
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);
        // Verify if the email matches with the email in the password reset table
        $resetRecord = DB::table('password_resets')->where('email', $request->email)->first();
        if (!$resetRecord) {
            return back()->withErrors(['email' => 'Invalid password reset token or email.']);
        }
        $status = Password::broker('visitors')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($visitor, $password) {
                $visitor->credentials()->updateOrCreate(
                    ['visitor_id' => $visitor->id],
                    ['password' => Hash::make($password)]
                );
                // Optionally, log the visitor in after resetting the password
                // Auth::guard('visitor')->login($visitor);
            }
        );
        if ($status == Password::PASSWORD_RESET) {
            return redirect('/')->with('success', 'Password reset successfully.');
        } else {
            return back()->withErrors(['email' => 'Password reset failed.']);
        }
    }
}
