<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

// Admin
Route::prefix('admin')->group(function () {
    Route::controller(DashboardController::class)->prefix('/')->group(function () {
        Route::get('', 'index')->name('admin.dashboard');
    });

    Route::controller(CategoryController::class)->prefix('/category')->group(function () {
        Route::get('', 'index')->name('beranda.category');
    });

    Route::controller(ProductController::class)->prefix('/product')->group(function () {
        Route::get('', 'index')->name('beranda.product');
    });
});


// Kasir
Route::prefix('/kasir')->group(function () {
    Route::controller(CashierController::class)->prefix('/')->group(function () {
        Route::get('', 'index')->name('kasir.dashboard');
    });
});
