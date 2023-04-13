<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;

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

        // generate invoice
        $pdf = app('dompdf.wrapper');
        $pdf->loadview('invoice', compact('transaction', 'cart'));
        $file_name = 'invoice_' . $transaction->id . '.pdf';
        Storage::makeDirectory('public/invoices');
        $pdf->save(storage_path('app/public/invoices/' . $file_name));
        $request->session()->forget('cart');
        response()->download(storage_path('app/public/invoices/' . $file_name));
        return redirect('/cashier/order')->with('alert', 'Transaksi berhasil');
    }
}
