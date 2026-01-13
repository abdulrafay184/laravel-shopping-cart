<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    function registerpage(){
        return view('Auth.register');
    }

    function loginpage(){
        return view('Auth.Login');
    }

    function userregister(Request $req){

        $data=$req->validate([
            'name'=>'required',
            'mail'=>'required|email|unique:users,mail',
            'password'=>'required',

        ]);


        $user=user::create($data);

        if($user){
            return redirect()->route('loginpage')->with('success','User Account Created..');
        }
        else{
            return 'User not Inserted';
        }
    }

    function userlogin(Request $req){
        $logindetail=$req->validate([
            'mail'=>'required|email',
            'password'=>'required'
        ]);

    if(Auth::attempt($logindetail)){
    if(Auth::user()->role == 'admin'){
        return redirect()->route('admin.index');
    } else {
        return redirect()->route('userindex');
    }
}



    }
}

