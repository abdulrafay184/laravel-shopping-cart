<?php

namespace App\Http\Controllers;

use App\Mail\welcomemail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function registerpage()
    {
        return view('Auth.register');
    }

    public function loginpage()
    {
        return view('Auth.login');
    }

    // ================= REGISTER =================
    public function userregister(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'mail' => 'required|email|unique:users,mail',
            'password' => 'required|min:6',
        ]);


    $message="Laadlyyy Shopping krne Aya hyyy!!";
    $subject="User Registration Detail";
    Mail::to($req->email)->send(new welcomemail($message,$subject));

        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'user';

        User::create($data);

        return redirect()->route('loginpage')
            ->with('success', 'Account created successfully');
    }

    




    // ================= LOGIN =================
    public function userlogin(Request $req)
    {
        $credentials = $req->validate([
            'mail' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->route('userindex');
        }

        return back()->withErrors([
            'mail' => 'Invalid email or password'
        ]);
    }
}
