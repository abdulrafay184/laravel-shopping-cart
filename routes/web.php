<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\validrole;
use App\Http\Middleware\validuser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Welcome / Home Page
Route::get('/', function () {
    return view('welcome');
})->name('home');





// Auth Routes
Route::get('/auth.register', [AuthController::class, 'registerpage'])->name('registerpage');
Route::get('/auth.login', [AuthController::class, 'loginpage'])->name('loginpage');

// User Register/Login
Route::post('/user.add', [AuthController::class, 'userregister'])->name('userregister');
Route::post('/user.login', [AuthController::class, 'userlogin'])->name('userlogin');

// Admin Dashboard & Routes
Route::middleware(validrole::class)->group(function () {
    Route::get('/Admin.index', [AdminController::class, 'adminindex'])->name('admin.index');
    Route::get('/admin.dashboard', [AdminController::class, 'dashboard'])->name('admindashboard');

    // All Users
    Route::get('/admin.alluser', [AdminController::class, 'getusers'])->name('allusers');

    // User Delete
    Route::get('/admin.userdel/{id}', [AdminController::class, 'deleteuser'])->name('userdelete');

    // Admin Edit/Update Users
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'edit'])->name('admin.useredit');
    Route::post('/admin/user/update/{id}', [AdminController::class, 'update'])->name('admin.userupdate');
});

// User Dashboard & Routes
Route::middleware(validuser::class)->group(function () {
    Route::get('/User.index', [UserController::class, 'userindex'])->name('userindex');

    // User Edit/Update
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('useredit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('userupdate');
});

// Products Routes
Route::prefix('admin')->group(function () {
    Route::get('/insertproducts', [ProductsController::class, 'insert'])->name('insertproducts');
    Route::post('/insert', [ProductsController::class, 'insertProducts'])->name('insert');
});

// Public Products
Route::get('/fatchProducts', [ProductsController::class, 'FatchProducts'])->name('fatchProducts');
Route::get('/product/{id}', [ProductsController::class, 'show'])->name('product.details');
Route::get('/order/{id}', [ProductsController::class, 'order'])->name('place.order');

// Delete Product
Route::get('/deletecourse/{id}', [ProductsController::class, 'deleteProduct'])->name('deleteproduct');

Route::get('/category/{category}', [ProductsController::class, 'categoryProducts'])
    ->name('category.products');

    // PUBLIC PRODUCTS
Route::get('/fatchProducts', [ProductsController::class, 'FatchProducts'])->name('fatchProducts');
Route::get('/product/{id}', [ProductsController::class, 'show'])->name('product.details');
Route::get('/order/{id}', [ProductsController::class, 'order'])->name('place.order');

// CATEGORY PRODUCTS
Route::get('/category/{category}', [ProductsController::class, 'categoryProducts'])->name('category.products');

Route::get('/product/{id}', [ProductsController::class, 'show'])->name('product.details');

// CATEGORY PRODUCTS
Route::get('/category/{category}', [ProductsController::class, 'categoryProducts'])->name('category.products');

// PRODUCT DETAIL
Route::get('/product/{id}', [ProductsController::class, 'show'])->name('product.details');

// PLACE ORDER
Route::get('/order/{id}', [OrderController::class,'order'])->name('place.order');

// Contact Page
Route::get('/contact', function(){
    return view('User.contact');
})->name('contact');

// contact form
Route::post('/contact-submit', [UserController::class, 'submitContact'])->name('contact.submit');


Route::get('/userorder{id}',[OrderController::class,'orderbook'])->name('orderbook');
