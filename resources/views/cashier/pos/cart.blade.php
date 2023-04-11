@extends('layouts.app')

@section('title', 'Kasir - Cart')

@section('content')

    <a href="{{ url('/cashier/order') }}">kembali</a>
    <br><br>

    @foreach($keranjang as $item)
         No : {{ $loop->iteration }} <br>
         nama produk : {{ $products->where('id', $item['product_id'])->first()->name }} <br>
         jumlah : {{ $item['quantity'] }} <br>
         total : {{ $item['total'] }}
         <br><br>
    @endforeach
@endsection
