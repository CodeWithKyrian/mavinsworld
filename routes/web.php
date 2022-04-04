<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
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

Route::get('/test-order-dispatched', function() {
    $order = \App\Models\Order::with('user')->where('code', '20220228-5136')->first();

    return new \App\Mail\OrderDispatched($order);
});

// HOME PAGES
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-us', [HomeController::class, 'contactPost'])->name('contact');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
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
Route::post('/update_order_summary', [CartController::class, 'updateOrderSummary'])->name('cart.update-order-summary');
Route::post('/place-order', [CartController::class, 'placeOrder'])->name('cart.place-order');

// REVIEWS AND RATINGS
Route::resource('product.reviews', ReviewController::class)->only(['index']);

// PAYMENT
Route::post('/checkout', [OrderController::class, 'store'])->name('order.checkout');
Route::get('/payment/callback', [OrderController::class, 'callback'])->name('order.payment.callback');
Route::get('/payment/cancelled/{order}', [OrderController::class, 'cancelled'])->name('order.payment.cancelled');



Route::middleware('auth')->group(function (){
    Route::get('/account/dashboard', [AccountController::class, 'dashboard'])->name('account.dashboard');
    Route::get('/account/orders', [AccountController::class, 'orders'])->name('account.orders.index');
    Route::get('/account/orders/track', [AccountController::class, 'trackOrder'])->name('account.orders.track');
    Route::get('/account/orders/{order}', [AccountController::class, 'viewOrder'])->name('account.orders.show');
    Route::delete('/account/orders/{order}', [AccountController::class, 'deleteOrder'])->name('account.orders.destroy');
    Route::get('/account/details', [AccountController::class, 'account_details'])->name('account.details');
    Route::put('/account/details', [AccountController::class, 'update_details'])->name('account.details.update');
    Route::put('/account/password', [AccountController::class, 'update_password'])->name('account.password.update');
    Route::resource('product.reviews', ReviewController::class)->only(['store', 'update']);
    Route::get('/pay/{order}', [OrderController::class, 'pay'])->name('order.pay');
});
