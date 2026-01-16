<?php

namespace App\Models;
use App\Models\order;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
class order extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }

    function products(){
        return $this->belongsTo(Product::class);
    }
}
