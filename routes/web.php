<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ******** GET ROUTES ***************************************
Route::get('/about', function () {
    return view('about-us');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/billing', function () {
    return view('billing');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/failure', function () {
    return view('failure');
});

Route::get('/user_exists', function () {
    return view('user_exists');
});

//Route::get('/', [ProductController::class, 'ProductDetials']);
     
Route::get('/home', [ProductController::class, 'ProductDetials']);

Route::get('/products', [ProductController::class, 'ProductsForProductsPage']);

Route::get('/cart', [ProductController::class, 'displayCart']);

Route::get('/logout', function () {
    // removing the session of the logged in user 
    Session()->forget('user');
    return view('login');
});

Route::get('cart/{id}', [ProductController::class, 'removeItem']);

Route::get('/success', function () {
    return view('success');
});

Route::get('/msg_sent', function () {
    return view('msg_sent');
});

Route::get('/search', [ProductController::class, 'searchProduct']);

Route::get('/search-request', [ProductController::class, 'productSuggestions']);

Route::get('/profile', [UserController::class, 'displayProfileDetails']);

// ******** POST ROUTES ******************************************************

Route::post('/signup', [UserController::class, 'signup']);

Route::post('/login', [UserController::class, 'login']);

Route::post('home/{id}', [ProductController::class, 'addToCart']);

Route::post('products/{id}', [ProductController::class, 'addProductToCart']);

Route::post('/success', [ProductController::class, 'checkOut']);

Route::post('/msg_sent', [UserController::class, 'sendMessage']);

Route::post('/profile', [UserController::class, 'updateProfile']);






