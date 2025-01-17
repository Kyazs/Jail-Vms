<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\VisitorCredential;
use App\Models\Blacklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Make sure to import this
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('visitor')->check()) {
            return redirect()->route('dashboard');
        }
        if (Auth::guard('web')->check()) {
            return redirect()->route('admins.dashboard');
        }
        return view('users.login'); // Assuming you have a login view
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        // Attempt Authentication
        $visitorCredential = VisitorCredential::where('username', $credentials['username'])->with('visitor')->first();
        if (!$visitorCredential) {
            return back()->withErrors(['username' => 'Invalid credentials.']);
        }
        $visitor = $visitorCredential->visitor; // Access the related visitor
        if ($visitor) {
            if ($visitor->is_deleted == 1) {
                return back()->withErrors(['username' => 'Your account has been deleted.']);
            }
            // if ($visitor->is_verified == 0) {
            //     return back()->withErrors(['username' => 'Your account is pending verification.']);
            // }
            // Check if the visitor is blacklisted
            $blacklist = Blacklist::where('visitor_id', $visitor->visitor_id)->first();
            if ($blacklist) {
                return back()->withErrors(['username' => 'Your account has been blacklisted. Go to the ZCJ to comply.']);
            }
            if (Hash::check($credentials['password'], $visitorCredential->password)) {
                // Authenticate the user
                Auth::guard('visitor')->login($visitor);
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard')); // Redirect to intended URL or dashboard
            }
        }
        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    // 
    // admin login
    // 
    public function showAdminLoginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('admins.dashboard');
        }
        return view('admins.login'); // Assuming you have a login view
    }
    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        // Ensure username and password are present
        if (!$request->has(['username', 'password'])) {
            return back()->withErrors(['username' => 'Username and password are required.']);
        }
        // Attempt Authentication
        $user = User::where('username', $credentials['username'])->first();
        if (!$user) {
            return back()->withErrors(['username' => 'Invalid credentials.']);
        }
        if (Hash::check($credentials['password'], $user->password)) {
            // Authenticate the user
            Auth::guard('web')->login($user);
            $request->session()->regenerate();
            return redirect()->intended(route('admins.dashboard')); // Redirect to intended URL or dashboard
        }
        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    //Logout method
    public function logout(Request $request)
    {
        Auth::guard('visitor')->logout(); // Ensure the visitor is logged out
        Auth::guard('web')->logout(); // Ensure the admin is logged out
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect to the home page or any other page
    }
}
