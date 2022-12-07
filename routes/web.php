<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StoreController;
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

Route::resource('cart', CartController::class)->middleware('auth');
Route::resource('store', StoreController::class)->middleware('auth');
Route::get('store/list-product', [StoreController::class, 'product'])->name('store.product');
Route::resource('produk', ProdukController::class);

require __DIR__ . '/auth.php';
