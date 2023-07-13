<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::with('users')->get();
        return view('admin.transaction.index', ['transaksi' => $transaction]);
    }

    public function show_daily_transaction()
    {
        $currentDay = date('d');
        $transaction = Transaction::with('users')->whereDay('created_at', $currentDay)->get();
        $today_income = Transaction::whereDay('created_at', $currentDay)->sum('grandtotal');
        $today_count = Transaction::whereDay('created_at', $currentDay)->count();
        return view('cashier.transaction.index', ['transaksi' => $transaction, 'today_income' => $today_income, 'today_count' => $today_count]);
    }
}
