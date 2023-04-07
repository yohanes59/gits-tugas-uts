<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DetailTransactionController;

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

// // Admin
// Route::prefix('admin')->group(function () {
//     Route::controller(DashboardController::class)->prefix('/')->group(function () {
//         Route::get('', 'index')->name('admin.dashboard');
//     });

//     Route::controller(CategoryController::class)->prefix('/category')->group(function () {
//         Route::get('', 'index')->name('beranda.category');
//     });

//     Route::controller(ProductController::class)->prefix('/product')->group(function () {
//         Route::get('', 'index')->name('beranda.product');
//     });
// });


// // Kasir
// Route::prefix('/kasir')->group(function () {
//     Route::controller(CashierController::class)->prefix('/')->group(function () {
//         Route::get('', 'index')->name('kasir.dashboard');
//     });
// });


Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'doRegister']);
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/detail-transaction', DetailTransactionController::class);
});

Route::prefix('/kasir')->group(function () {
    Route::resource('/cart', CartController::class);
    Route::resource('/order', OrderController::class);
});
