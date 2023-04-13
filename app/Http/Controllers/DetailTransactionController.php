<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DetailTransactionController extends Controller
{
    public function show($id)
    {
        // ambil id ketika klik tombol
        $transaction = Transaction::findOrFail($id);
        $transactionID = $transaction->id;

        // cari data detail transaksi sesuai dengan transaction_id
        $dataDetailTransaction = DetailTransaction::with('product.category')->where('transaction_id', $transactionID)->get();
        return view('admin.transaction.detail', ['detail' => $dataDetailTransaction]);
    }
}
