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
use App\Http\Controllers\ReceiptController;

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

Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('isLogin');
Route::post('/', [AuthController::class, 'doLogin'])->name('do.login');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [AuthController::class, 'edit']);
    Route::post('/profile/{id}', [AuthController::class, 'update']);

    Route::middleware('AdminOnly')->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index']);
            Route::get('/cashier-account', [DashboardController::class, 'account']);
            Route::get('/register', [AuthController::class, 'register'])->name('register');
            Route::post('/register', [AuthController::class, 'doRegister'])->name('do.register');
            Route::post('/cashier-account/delete/{id}', [DashboardController::class, 'destroy']);

            Route::resource('/category', CategoryController::class);
            Route::resource('/product', ProductController::class);
            Route::get('/transaction', [TransactionController::class, 'index']);
            Route::get('/detail-transaction/{id}', [DetailTransactionController::class, 'show']);
        });
    });

    Route::middleware('CashierOnly')->group(function () {
        Route::prefix('/cashier')->group(function () {
            Route::resource('/cart', CartController::class);
            Route::resource('/order', OrderController::class);
            Route::post('/checkout', [CartController::class, 'insertData'])->name('checkout');
            Route::get('/receipt', [ReceiptController::class, 'index'])->name('receipt');

            Route::get('/transaction', [TransactionController::class, 'show_daily_transaction']);
            Route::get('/detail-transaction/{id}', [DetailTransactionController::class, 'show_cashier_detail_transaction']);
        });
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
