<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function adminindex(){
    return view('Admin.index');
}


function getusers(){

    $user=User::all();
    return view('Admin.allusers',['alluser'=>$user]);
}

public function dashboard()
    {
        $alluser = User::all();
        return view('Admin.dashboard', compact('alluser'));
    }

function deleteuser($id){

    $result=User::destroy($id);
    if($result){
        return redirect()->route('allusers')->with('success','Data is deleted...');
    }
    else{
        return redirect()->route('allusers');
    }
}

}
