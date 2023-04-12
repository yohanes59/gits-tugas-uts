<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $productIds = collect($cart)->pluck('product_id');
        $products = Product::whereIn('id', $productIds)->get();
        return view('cashier.pos.cart', ['keranjang' => $cart, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
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
}
