<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order($id){
        $product = Product::findOrFail($id);
        return view('User.placeorder', compact('product'));
    }

function orderbook($id){
$product=Product::find($id);
$userid=Auth::user()->id;
$order=new order();
$order->userid=$userid;
$order->productid=$product->id;
$order->quantity=1;
$order->save();

return view('User.orderconfirm');

}



}
