<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        $sales = DetailTransaction::groupBy('product_id')
            ->join('products', 'detail_transactions.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('product_id', 'products.name as product_name', 'categories.name as category_name', DB::raw('SUM(quantity) as total_quantity'))
            ->paginate(10);

        return view('admin.sales.index', ['sales' => $sales]);
    }
}
