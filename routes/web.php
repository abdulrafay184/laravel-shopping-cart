<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admincontroller;
use App\Http\middleware\validrole;
use App\Http\middleware\validuser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth.register',[AuthController::class,'registerpage'])->name('registerpage');
Route::get('/auth.login',[AuthController::class,'loginpage'])->name('loginpage');

//userRegister
Route::post('/user.add',[AuthController::class,'userregister'])->name('userregister');

//userlogin
Route::Post('/user.login',[AuthController::class,'userlogin'])->name('userlogin');

//Admin screen
Route::get('/Admin.index',[AdminController::class,'adminindex'])->name('admin.index')->middleware(validrole::class);

//Userscreen
Route::get('/User.index',[UserController::class,'userindex'])->name('userindex')->middleware(validuser::class);

route::get("/sidebar.index",function(){
    return view("User.user");
});


