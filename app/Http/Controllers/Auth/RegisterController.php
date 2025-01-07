<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        if (Auth::guard('visitor')->check()) {
            return redirect()->route('dashboard');
        }
        return view('users.register');
    }

    public function register(Request $request)
    {
        // 1. Validate the input
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:visitors'], // Unique email for visitors
            'contact_number' => ['required', 'unique:visitors', 'regex:/^(09)[0-9]{9}$/'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'gender_id' => ['required', 'exists:genders,id'],
            'country' => ['required', 'string', 'max:255'],
            'address_street' => ['required', 'string', 'max:255'],
            'address_city' => ['required', 'string', 'max:255'],
            'address_province' => ['required', 'string', 'max:255'],
            'address_barangay' => ['required', 'string', 'max:255'],
            'address_zip' => ['required', 'string', 'max:10'],
            'id_type' => ['required', 'exists:id_types,id'],
            'id_document' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'username' => ['required', 'string', 'max:255', 'unique:visitor_credentials'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Password confirmation
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // 2. Handle File Upload (id_document is required)
        $filePath = $request->file('id_document')->store('id_documents', 'public');

        // 3. Create the Visitor record
        $visitor = Visitor::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'contact_number' => $request->input('contact_number'),
            'date_of_birth' => $request->input('date_of_birth'),
            'gender_id' => $request->input('gender_id'),
            'country' => $request->input('country'),
            'address_street' => $request->input('address_street'),
            'address_city' => $request->input('address_city'),
            'address_province' => $request->input('address_province'),
            'address_barangay' => $request->input('address_barangay'),
            'address_zip' => $request->input('address_zip'),
            'id_type' => $request->input('id_type'),
            'id_document_path' => $filePath,
            'is_verified' => false,
        ]);
        // 4. Create the VisitorCredential record
        $visitor->credentials()->create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Log the visitor in
        Auth::guard('visitor')->login($visitor);

        // Trigger the Registered event to send the verification email
        // Trigger the Registered event
        event(new Registered($visitor));
        
        // Send a verification email
        $visitor->sendEmailVerificationNotification();
        return redirect()->route('verification.notice')->with('success', 'Registration successful. confirm your email address!');
    }

    // email verification notice
    public function verifyNotice(Request $request)
    {
        if ($request->user('visitor')->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }
        return view('auth.verify-email');
    }

    // email verification handler ROUTE
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('dashboard');
    }

    // Resend email verification
    public function resendVerification(Request $request)
    {
        if ($request->user('visitor')->hasVerifiedEmail()) {
            return redirect()->route('dashboard')->with('info', 'Your email is already verified.');
        }

        $request->user('visitor')->sendEmailVerificationNotification();
        return back()->with('info', 'Verification link sent!');
    }
}
