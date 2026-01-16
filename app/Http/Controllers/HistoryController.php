<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
class HistoryController extends Controller
{

function userhistory(){

    $data=order::with(['user','products'])->get();
    return view('User.History',compact('data'));
}
}
