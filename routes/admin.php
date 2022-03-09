<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingsController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now let's create something great!
|
*/

Route::name('admin.')->group(function () {
    Route::middleware('auth.admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('product', ProductController::class);
        Route::resource('order', OrderController::class)->only(['index', 'show', 'destroy', 'update']);
        Route::resource('category', CategoryController::class)->except(['show']);

        Route::resource('review', ReviewController::class)->only(['index',  'destroy']);

        Route::get('settings/general', [SettingsController::class, 'general'])->name('settings.general.index');
        Route::get('settings/shipping', [SettingsController::class, 'shipping'])->name('settings.shipping.index');
        Route::get('settings/shipping/{cost}', [SettingsController::class, 'editShippingCost'])->name('settings.shipping.edit');
        Route::put('settings/shipping/{cost}', [SettingsController::class, 'updateShippingCost'])->name('settings.shipping.update');
    });

    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});
