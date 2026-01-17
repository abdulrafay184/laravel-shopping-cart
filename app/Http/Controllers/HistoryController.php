<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\order;
use Illuminate\Support\Facades\Auth;
class HistoryController extends Controller
{

function userhistory(){
$id=Auth::user()->id;
    //$data=order::with(['user','products'])->get();
    $data=DB::select('select * from orders inner join users on orders.userid=users.id inner join products on orders.productid=products.id where orders.userid='.$id);

    return view('User.History',compact('data'));
}
}
