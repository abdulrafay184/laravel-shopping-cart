<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // ================= ADD TO CART =================
    public function add($id)
    {
        if (!Auth::check()) {
            return redirect()->route('loginpage')->with('error', 'Please login first.');
        }

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->Name,
                'price' => $product->Price,
                'image' => $product->pic,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart');
    }

    // ================= CART PAGE =================
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('loginpage')->with('error', 'Please login first.');
        }

        $cart = session()->get('cart', []);
        return view('User.cart', compact('cart'));
    }

    // ================= REMOVE ITEM =================
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Product removed from cart');
    }

    // ================= UPDATE QUANTITY =================
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $quantity = max(1, intval($request->quantity)); // quantity minimum 1
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Cart updated successfully');
    }
}
