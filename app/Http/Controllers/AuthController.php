<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class AuthController extends Controller
{
    // Register Page
    public function registerPage()
    {
        return view('Auth.register');
    }

    // Login Page
    public function loginPage()
    {
        return view('Auth.login');
    }

    // Register User
    public function userRegister(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // $data['role'] = 'user';

        // Password auto-hash
        User::create($data);

        return redirect()->route('loginpage')->with('success', 'Account created successfully');
    }

    // User Login
    public function userLogin(Request $req)
    {
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->route('userindex');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password'
        ]);
    }

    // Logout
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('loginpage');
    }
}
