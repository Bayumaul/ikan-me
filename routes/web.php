<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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

Route::get('/store/list-product', function () {
    // return 'asu';
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('order', OrderController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('purchase', PurchaseController::class)->middleware('auth');
Route::post('{purchase}/checkout', [PurchaseController::class, 'checkout'])->name('purchase.checkout')->middleware('auth');
Route::resource('cart', CartController::class)->middleware('auth');
Route::resource('store', StoreController::class)->middleware('auth');
Route::post('produk/add-to-cart', [ProdukController::class, 'addtocart'])->name('produk.addtocart')->middleware('auth');
Route::post('produk/update-to-cart', [CartController::class, 'updatecart'])->name('cart.updatecart')->middleware('auth');
Route::get('produk/delete-to-cart', [CartController::class, 'destroyall'])->name('cart.destroyall')->middleware('auth');
Route::get('store/list-product', [StoreController::class, 'product'])->name('store.product');
Route::resource('produk', ProdukController::class);

require __DIR__ . '/auth.php';
