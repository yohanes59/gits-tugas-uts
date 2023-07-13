@extends('layouts.app')

@section('title', 'Transaction - List')

@section('content')
    <h3>List Daily Transaksi</h3>
    <div class="row my-3">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Pemasukan Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                {{ number_format($today_income, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bills fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Transaksi Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $today_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-receipt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
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
                        <td class="py-3 align-middle">{{ $item->created_at->format('d M Y H:i:s') }}</td>
                        <td class="py-3 align-middle">{{ $item->id }}</td>
                        <td class="py-3 align-middle">{{ $item->users->name }}</td>
                        <td class="py-3 align-middle">Rp {{ number_format($item->grandtotal, 0, ',', '.') }}</td>
                        <td class="d-flex py-3 align-middle gap-2">
                            <a href="/cashier/detail-transaction/{{ $item->id }}" class="btn btn-sm btn-primary">
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
