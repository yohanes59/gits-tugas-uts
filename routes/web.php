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
        Route::get('', 'index')->name('category.beranda');
        Route::get('tambah', 'create')->name('category.tambah');
        Route::post('tambah', 'store')->name('category.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('category.edit');
        Route::post('edit/{id}', 'update')->name('category.edit.update');
        Route::get('hapus/{id}', 'destroy')->name('category.hapus');
    });

    Route::controller(ProductController::class)->prefix('/product')->group(function () {
        Route::get('', 'index')->name('product.beranda');
        Route::get('tambah', 'create')->name('product.tambah');
        Route::post('tambah', 'store')->name('product.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('product.edit');
        Route::post('edit/{id}', 'update')->name('product.edit.update');
        Route::get('hapus/{id}', 'destroy')->name('product.hapus');
    });
});

// Kasir
Route::prefix('/kasir')->group(function () {
    Route::controller(CashierController::class)->prefix('/')->group(function () {
        Route::get('', 'index')->name('kasir.dashboard');
    });
});
