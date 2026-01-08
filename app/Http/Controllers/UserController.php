<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ======================
    // USER HOME PAGE
    // ======================
    public function userindex()
    {
        $products = Product::with('category')->get();
        return view('user.index', compact('products'));
    }

    // ======================
    // USER CATEGORY PAGE
    // ======================
    public function usercategory()
    {
        $categories = Category::all();
        return view('user.category', compact('categories'));
    }

    // ======================
    // EDIT USER (ADMIN)
    // ======================
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
