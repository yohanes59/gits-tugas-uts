<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $productIds = collect($cart)->pluck('product_id');
        $products = Product::whereIn('id', $productIds)->get();
        return view('cashier.pos.cart', ['keranjang' => $cart, 'products' => $products]);
    }

    public function destroy(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);

        $itemIndex = collect($cart)->search(function ($item) use ($productId) {
            return $item['product_id'] == $productId;
        });

        if ($itemIndex !== false) {
            array_splice($cart, $itemIndex, 1);
            $request->session()->put('cart', $cart);
        }

        return redirect('/cashier/cart');
    }

    public function insertData(Request $request)
    {
        $userID = Auth::user()->id;
        $grandtotal = $request->grandtotal;
        // simpan data ke tabel transaksi
        $transaction = Transaction::create([
            'user_id' => $userID,
            'grandtotal' => $grandtotal,
        ]);

        $cart = $request->session()->get('cart', []);

        foreach ($cart as $productId => $item) {
            DetailTransaction::create([
                'transaction_id' => $transaction->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'total' => $item['total'],
            ]);
        }

        $request->session()->forget('cart');

        return redirect('/cashier/order');
        
        // pakai session message?
        // return redirect('/cashier/order')->with('success', 'Transaksi berhasil');
    }
}
