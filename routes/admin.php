<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');


    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('add/product/form', [ProductController::class, 'addProductForm'])->name('add.product.form');
        Route::post('product/store', [ProductController::class, 'productStore'])->name('product.store');
        Route::get('product/list', [ProductController::class, 'productList'])->name('product.list');
        Route::get('order/list', [ProductController::class, 'orderList'])->name('order.list');
        Route::get('order/details/{id}', [ProductController::class, 'orderDetails'])->name('order.details');
    });

});

