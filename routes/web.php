<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CheckoutsController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\ValidRole;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Auth;
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

// ---------------- AUTH ROUTES ----------------
Route::get('/auth.register', [AuthController::class, 'registerpage'])->name('registerpage');
Route::get('/auth.login', [AuthController::class, 'loginpage'])->name('loginpage');

// User Register/Login
Route::post('/user.add', [AuthController::class, 'userregister'])->name('userregister');
Route::post('/user.login', [AuthController::class, 'userlogin'])->name('userlogin');

// ---------------- ADMIN DASHBOARD & ROUTES ----------------
Route::middleware([ValidRole::class])->group(function () {

    Route::get('/Admin.index', [AdminController::class, 'adminindex'])->name('admin.index');
    Route::get('/admin.dashboard', [AdminController::class, 'dashboard'])->name('admindashboard');

    // All Users
    Route::get('/admin.alluser', [AdminController::class, 'getusers'])->name('allusers');

    // User Delete
    Route::get('/admin.userdel/{id}', [AdminController::class, 'deleteuser'])->name('userdelete');

    // Admin Edit/Update Users
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'edit'])->name('admin.useredit');
    Route::post('/admin/user/update/{id}', [AdminController::class, 'update'])->name('admin.userupdate');

    // Admin Contact Routes
    Route::get('/admin/contacts', [ContactController::class, 'adminMessages'])->name('admin.contacts');
    Route::get('/admin/contact/reply/{id}', [ContactController::class, 'replyForm'])->name('admin.contact.reply');
    Route::post('/admin/contact/reply/{id}', [ContactController::class, 'sendReply'])->name('admin.contact.sendReply');
    Route::delete('/admin/contact/delete/{id}', [ContactController::class, 'deleteMessage'])->name('admin.contact.delete');
});

// ---------------- USER DASHBOARD & ROUTES ----------------
Route::middleware([ValidUser::class])->group(function () {
    Route::get('/User.index', [UserController::class, 'userindex'])->name('userindex');

    // User Edit/Update
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('useredit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('userupdate');
});

// ---------------- PRODUCTS ----------------
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

// Category Products
Route::get('/category/{category}', [ProductsController::class, 'categoryProducts'])->name('category.products');


// ---------------- CONTACT ----------------
// User contact page & submit
Route::middleware('auth')->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');
    Route::get('/my-messages', [ContactController::class, 'myMessages'])->name('user.messages');
    Route::get('/user/messages/{id}', [ContactController::class, 'showUserMessage'])->name('user.messages.show');
});

// Admin Contact Routes
Route::get('/adminreply',[ContactController::class,"adminreply"])->name('adminreply');



// ---------------- BLOG ----------------
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Admin Blog CRUD
Route::middleware(['auth', ValidRole::class])->group(function () {
    Route::get('/admin/blogs', [BlogController::class, 'adminIndex'])->name('admin.blogs');
    Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blog/store', [BlogController::class, 'stores'])->name('admin.blog.store');
    Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('/admin/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::get('/admin/blog/delete/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');
});


// ---------------- CONTACT ----------------
// Redirect GET request for /contact-submit to avoid MethodNotAllowed
Route::get('/contact-submit', function() {
    return redirect()->route('contact');
});


// ---------------- ORDERS ----------------
Route::get('/userorder{id}', [OrderController::class, 'orderbook'])->name('orderbook');
Route::get('/order/{id}', [OrderController::class,'order'])->name('place.order');
Route::get('/fatchOrders', [OrderController::class,'fatchorder'])->name('fatchorders');


// User history
Route::get('/user>history',[HistoryController::class,'userhistory'])->name('history');


// user logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    
    return redirect()->route('loginpage');
})->name('logout');



// User checkouts
Route::get('/user>chekout',[CheckoutsController::class,'usercheckouts'])->name('checkouts');


//checkout
Route::post('/userCheckouts', [CheckoutsController::class,'usercheckoutsconfirm'])->name('checkoutconfirm');
Route::get('/checkoutsFatch',[CheckoutsController::class,'fatchcheckout'])->name('fatchcheckout');

//search
Route::get('/search', [ProductsController::class, 'search'])->name('search');
    
//shop
Route::get('/shop', [ProductsController::class, 'shop'])->name('shop');
//Route::get('/product/{id}', [ProductsController::class, 'show'])->name('product.detail');

//cart

   Route::middleware('auth')->group(function() {
    Route::post('/add-to-cart/{id}', [CartController::class, 'add'])->name('add.to.cart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
});     



// USER
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/my-messages', [ContactController::class, 'myMessages'])
    ->name('user.messages')
    ->middleware('auth');
Route::get('/my-messages/{id}', [ContactController::class, 'showUserMessage'])
    ->name('user.message.view')
    ->middleware('auth');

// ADMIN
Route::get('/admin/contacts', [ContactController::class, 'adminMessages'])
    ->name('admin.contacts');
Route::get('/admin/contact/reply/{id}', [ContactController::class, 'replyForm'])
    ->name('admin.contact.reply');
Route::post('/admin/contact/reply/{id}', [ContactController::class, 'sendReply'])
    ->name('admin.contact.sendReply');
Route::delete('/admin/contact/{id}', [ContactController::class, 'deleteMessage'])
    ->name('admin.contact.delete');


   //contact msg 
Route::get('/admin/contacts', [ContactController::class, 'adminMessages'])
    ->name('admin.contacts');

Route::get('/admin/contacts/reply/{id}', [ContactController::class, 'replyForm'])
    ->name('admin.contacts.reply');

Route::post('/admin/contacts/reply/{id}', [ContactController::class, 'sendReply'])
    ->name('admin.contacts.sendReply');
//
    Route::get('/product/{id}', [ProductsController::class, 'show'])
    ->name('product.details');
//shop page
    //Route::get('/shop', [ProductsController::class, 'shop'])->name('shop');

    //Route::get('/product/{id}', [ProductsController::class, 'show'])->name('product.details');

    Route::post('/admin/product/insert', [ProductsController::class, 'insertProducts'])
    ->name('insertProducts');

    // HOME
//Route::get('/', [ProductsController::class, 'index'])->name('home');

// SHOP
Route::get('/shop', [ProductsController::class, 'shop'])->name('shop');

// PRODUCT DETAIL
Route::get('/product/{id}', [ProductsController::class, 'show'])->name('product.details');

// CATEGORY
Route::get('/category/{category}', [ProductsController::class, 'categoryProducts'])
    ->name('category.products');

// CART
Route::middleware('auth')->group(function () {
    Route::post('/add-to-cart/{id}', [CartController::class, 'add'])->name('add.to.cart');
});


// Example
Route::get('/product/{id}', [ProductsController::class, 'show'])->name('product.details');
