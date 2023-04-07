<?php

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

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

    Route::get('category', function() {
        return view('admin.category.index');
    })->name('beranda.category');
    
    Route::get('product', function() {
        return view('admin.product.index');
    })->name('beranda.product');
});


// Kasir
Route::prefix('kasir')->group(function () {
    Route::get('/', function() {
        return view('kasir.dashboard.index');
    })->name('kasir.dashboard');
});