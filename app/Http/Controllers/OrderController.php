<?php

namespace App\Http\Controllers;

use session;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $product = Product::with('category')->get();
        return view('cashier.pos.index', ['produk' => $product]);
    }

    public function store(Request $request)
    {
        $productIds = $request->product_id;
        $qtys = $request->qty;
        $total = 0;
        $grandtotal = 0;
        $cart = $request->session()->get('cart', []);

        foreach ($productIds as $key => $productId) {
            $qty = $qtys[$key];
            if ($qty > 0) {
                $product = Product::find($productId);
                $price = $product->price;
                $total = $price * $qty;
                $grandtotal += $total;

                $existingCartItemIndex = collect($cart)->search(function ($item) use ($productId) {
                    return $item['product_id'] == $productId;
                });

                if ($existingCartItemIndex !== false) {
                    $existingCartItem = $cart[$existingCartItemIndex];
                    // jika product_id sudah ada, qty & total lama + qty & total baru
                    $existingCartItem['quantity'] += $qty;
                    $existingCartItem['total'] += $total;
                    $cart[$existingCartItemIndex] = $existingCartItem;
                } else {
                    $newDataCart = [
                        'product_id' => $productId,
                        'quantity' => $qty,
                        'total' => $total,
                    ];
                    $cart[] = $newDataCart;
                }
            }
        }

        $request->session()->put('cart', $cart);

        return redirect('/cashier/cart');
    }
}
