<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // ADD TO CART
    public function add($id)
    {
        Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $id
            ],
            [
                'quantity' => \DB::raw('quantity + 1')
            ]
        );

        return back();
    }

    // SHOW CART
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();

        return view('cart.index', compact('cartItems'));
    }
    function shop(){


        return view('User.shop');
    }
}
