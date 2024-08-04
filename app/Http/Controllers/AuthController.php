<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials, $request->filled('remember_me'))) {
            // Login successful
            Log::info('Login successful for user ID: ' . Auth::id());
            return redirect()->route('home')->with('success', 'Login successful!');
        }

        // Login failed
        Log::warning('Login failed for email: ' . $request->email);
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        Session::flush();
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
