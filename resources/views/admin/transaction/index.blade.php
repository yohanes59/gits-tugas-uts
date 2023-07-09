@extends('layouts.app')

@section('title', 'Transaction - List')

@section('content')
    <h3>List Transaksi</h3>

    <div class="table-responsive mt-3">
        <table class="table table-hover border">
            <thead class="bg-gray-300 text-dark">
                <tr class="fw-semibold">
                    <td>Tanggal</td>
                    <td>ID</td>
                    <td>Nama Kasir</td>
                    <td>Total</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($transaksi as $item)
                    <tr>
                        <td class="py-3 align-middle">{{ $item->created_at }}</td>
                        <td class="py-3 align-middle">{{ $item->id }}</td>
                        <td class="py-3 align-middle">{{ $item->users->name }}</td>
                        <td class="py-3 align-middle">Rp {{ number_format($item->grandtotal, 0, ',', '.') }}</td>
                        <td class="d-flex py-3 align-middle gap-2">
                            <a href="/admin/detail-transaction/{{ $item->id }}" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        </td>
                    </tr>    
                @empty
                    <tr>
                        <td colspan="4">Belum ada data transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection