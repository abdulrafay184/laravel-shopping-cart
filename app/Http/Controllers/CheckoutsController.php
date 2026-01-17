<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutsController extends Controller
{
    function usercheckouts(){
        return view('User.Checkoutform');
    }
}
