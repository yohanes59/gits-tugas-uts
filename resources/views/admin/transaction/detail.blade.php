@extends('layouts.app')

@section('title', 'Transaction Detail')

@section('content')
    <div class="d-flex align-items-center gap-3 my-3">
        <a href="{{ url('admin/transaction') }}" class="btn btn-success">
            <i class="fa-solid fa-chevron-left"></i> Kembali
        </a>
        <div class="fs-4">Detail Transaksi</div>
    </div>

    <div class="mt-4">
        <div class="fs-5 fw-medium">Transaction ID : TxID001</div>

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
                    {{-- data statis --}}
                    <tr>
                        <td class="py-3 align-middle">Capucino</td>
                        <td class="py-3 align-middle">Cold</td>
                        <td class="py-3 align-middle">2</td>
                        <td class="py-3 align-middle">Rp 23.000</td>
                        <td class="py-3 align-middle">Rp 46.000</td>
                    </tr>
                    <tr>
                        <td class="py-3 align-middle">Americano</td>
                        <td class="py-3 align-middle">Hot</td>
                        <td class="py-3 align-middle">1</td>
                        <td class="py-3 align-middle">Rp 15.000</td>
                        <td class="py-3 align-middle">Rp 15.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection