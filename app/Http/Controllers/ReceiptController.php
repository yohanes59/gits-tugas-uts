<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index(Request $request)
    {
        $transaction = $request->session()->get('transaction');
        $cart = $request->session()->get('cart');

        $request->session()->forget('cart');

        return view('receipt', ['transaction' => $transaction, 'cart' => $cart]);
    }
}
