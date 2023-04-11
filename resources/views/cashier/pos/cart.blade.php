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
         <br>
         <form action="{{ url('/cashier/cart/' . $item['product_id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">DELETE</button>
         </form>
         <br>
    @endforeach
@endsection
