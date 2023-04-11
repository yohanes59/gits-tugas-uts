<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->get();
        return view('cashier.pos.index', ['produk' => $product]);
    }
}
