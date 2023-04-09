@extends('layouts.app')

@section('title', 'Transaction - List')

@section('content')
    <h3>List Transaksi</h3>

    <div class="table-responsive mt-3">
        <table class="table table-hover border">
            <thead class="bg-gray-300 text-dark">
                <tr class="fw-semibold">
                    <td>ID</td>
                    <td>Nama Kasir</td>
                    <td>Total</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody class="bg-white">
                <tr>
                    <td class="py-3 align-middle">TxID001</td>
                    <td class="py-3 align-middle">Kasir 1</td>
                    <td class="py-3 align-middle">Rp 61.000</td>
                    <td class="d-flex py-3 align-middle gap-2">
                        <a href="/admin/detail-transaction/show" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection