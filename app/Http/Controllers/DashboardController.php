<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['category'] = Category::count(); 
        $data['product'] = Product::count();
        $data['transaction'] = Transaction::count();
        $data['cashier'] = User::where('name', '!=', 'admin')->get();
        return view('admin.dashboard.index', $data);
    }

    public function account() {
        $kasir = User::where('name', '!=', 'admin')->get();
        return view('admin.account.index', ['kasir' => $kasir]);
    }
}
