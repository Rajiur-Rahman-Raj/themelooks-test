<?php

use App\Http\Controllers\FrontendController;
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

//Route::get('/', function (){
//    return redirect()->route('products');
//});

Route::redirect('/', 'products');

Route::get('/products', [FrontendController::class, 'products'])->name('products');
Route::get('/products/search', [FrontendController::class, 'productSearch'])->name('products.search');
Route::get('product/cart/view', [FrontendController::class, 'productCartView'])->name('product.cart.view');
Route::post('find-product-with-variants', [FrontendController::class, 'findProductWithVariants'])->name('product.find');
Route::post('product-cart-store', [FrontendController::class, 'productCartStore'])->name('product.cart.store');
