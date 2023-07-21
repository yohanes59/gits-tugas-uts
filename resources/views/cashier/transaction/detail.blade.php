@extends('layouts.app')

@section('title', 'Transaction Detail')

@section('content')
    <div class="d-flex align-items-center gap-3 my-3">
        <a href="{{ url('cashier/transaction') }}" class="btn btn-success">
            <i class="fa-solid fa-chevron-left"></i> Kembali
        </a>
        <div class="fs-4">Detail Transaksi</div>
    </div>

    <div class="mt-4">
        <div class="fs-5 fw-medium">Transaction ID : {{ $detail[0]['transaction_id'] }}</div>

        <div class="table-responsive mt-3">
            <table class="table table-hover border">
                <thead class="bg-gray-300 text-dark">
                    <tr class="fw-semibold">
                        <td>Nama Produk</td>
                        <td>Kategori Produk</td>
                        <td>Jumlah</td>
                        <td>Harga Satuan</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($detail as $item)
                        <tr>
                            <td class="py-3 align-middle">
                                <li>{{ $item->product_name }}</li>
                            </td>
                            <td class="py-3 align-middle">{{ $item->product_category }}</td>
                            <td class="py-3 px-4 align-middle">{{ $item->quantity }}</td>
                            <td class="py-3 align-middle">Rp {{ number_format($item->product_price, 0, ',', '.') }}</td>
                            <td class="py-3 align-middle">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
