<?php

namespace App\Http\Controllers;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutsController extends Controller
{
    function usercheckouts(){
        return view('User.Checkoutform');
    }

        // Insert Product
         function usercheckoutsconfirm(Request $req){
            $data = $req->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:20',
            'address'        => 'required|string|max:255',
            'city'           => 'required|string|max:100',
            'postal_code'    => 'required|string|max:20',
            'payment_method' => 'required|string',
            'notes'          => 'nullable|string',
             ]);

            $Checkout =new Checkout();
            $Checkout->name = $data['name'];
            $Checkout->email = $data['email'];
            $Checkout->phone = $data['phone'];
            $Checkout->address = $data['address'];
            $Checkout->city = $data['city'];
            $Checkout->postal_code = $data['postal_code'];
            $Checkout->payment_method = $data['payment_method'];
            $Checkout->notes = $data['notes'];
            $Checkout->save();

            return redirect()->route('userindex')->with('success', 'Your Order Confirm successfully...');


         }


    function fatcheckouts(){
        return view('Admin.CheckoutsFatch');
    }

}
