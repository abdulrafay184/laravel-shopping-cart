<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Productscontroller;
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

//allusers
Route::get('/admin.alluser',[AdminController::class,'getusers'])->name('allusers')->middleware(validuser::class);

// user delete
Route::get('/admin.userdel/{id}',[AdminController::class,'deleteuser'])->name('userdelete')->middleware(validuser::class);

//user edit
// EDIT USER
Route::get('/user/edit/{id}', [AdminController::class, 'edit'])
    ->name('useredit');

// UPDATE USER
Route::post('/user/update/{id}', [AdminController::class, 'update'])
    ->name('userupdate');

// ADMIN DASHBOARD
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admindashboard');
    
// insert product
Route::Get('admin/insertproducts',[ProductsController::class,'insert'])->name('insertproducts');
Route::Post('admin/insert',[ProductsController::class,'insertProducts'])->name('insert');
Route::get('/fatchProducts',[ProductsController::class,'FatchProducts'])->name('fatchProducts');

//course delete
Route::get('/deletecourse{id}',[ProductsController::class,'deleteProduct'])->name('deleteproduct');






// EDIT USER
Route::get('/user/edit/{id}', [UserController::class, 'edit'])
    ->name('useredit');

// UPDATE USER
Route::post('/user/update/{id}', [UserController::class, 'update'])
    ->name('userupdate');

// ADMIN DASHBOARD
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admindashboard');
