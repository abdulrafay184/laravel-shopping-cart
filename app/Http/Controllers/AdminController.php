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

public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Admin.user_edit', compact('user'));
    }

    // ======================
    // UPDATE USER (ADMIN)
    // ======================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mail' => 'required|email',
            'role' => 'required|string'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'mail' => $request->mail,
            'role' => $request->role,
        ]);

        return redirect()->route('admindashboard')
                         ->with('success', 'User Updated Successfully');
    }

} 
