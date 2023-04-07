<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\CategoryController;
=======
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
>>>>>>> 5c438c28444c9bb5d0d58ceb3c80a59a86e876a0

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

<<<<<<< HEAD
    Route::controller(CategoryController::class)->prefix('category')->group(function () {
		Route::get('', 'index')->name('category');
	});
    
    Route::get('product', function() {
        return view('admin.product.index');
    })->name('beranda.product');
=======
    Route::controller(CategoryController::class)->prefix('/category')->group(function () {
        Route::get('', 'index')->name('beranda.category');
    });

    Route::controller(ProductController::class)->prefix('/product')->group(function () {
        Route::get('', 'index')->name('beranda.product');
    });
>>>>>>> 5c438c28444c9bb5d0d58ceb3c80a59a86e876a0
});


// Kasir
<<<<<<< HEAD
Route::prefix('kasir')->group(function () {
    Route::get('/', function() {
        return view('kasir.dashboard.index');
    })->name('kasir.dashboard');
});

// Login
=======
Route::prefix('/kasir')->group(function () {
    Route::controller(CashierController::class)->prefix('/')->group(function () {
        Route::get('', 'index')->name('kasir.dashboard');
    });
});
>>>>>>> 5c438c28444c9bb5d0d58ceb3c80a59a86e876a0
