<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

// HOME PAGES
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::get('/terms-and-conditions', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::get('/category/{category}', [HomeController::class, 'category'])->name('category.show');

Route::get('/product/{product}', [HomeController::class, 'product_details'])->name('product.details');

Route::get('/get_states/{country}', [HomeController::class, 'getStates'])->name('states.get');

// CART AND SHIPPING
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/increase/{item}', [CartController::class, 'increaseItem'])->name('cart.increase');
Route::post('/cart/decrease/{item}', [CartController::class, 'decreaseItem'])->name('cart.decrease');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/delete', [CartController::class, 'deleteFromCart'])->name('cart.delete');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/get_shipping_methods/{state}', [CartController::class, 'getShippingMethods'])->name('cart.get_shipping_methods');
Route::get('/update_order_summary/{shipping_cost}', [CartController::class, 'updateOrderSummary'])->name('cart.order-summary-update');
Route::post('/place-order', [CartController::class, 'placeOrder'])->name('cart.place-order');

// PAYMENT
Route::post('/payment', [OrderController::class, 'checkout'])->name('order.payment');
Route::get('/payment/cancelled/{order}', [OrderController::class, 'cancelled'])->name('order.payment.cancelled');
Route::get('/payment/callback', [OrderController::class, 'callback'])->name('order.payment.callback');


Route::middleware('auth')->group(function (){
    Route::get('/my-account', [HomeController::class, 'my_account'])->name('my-account');
});