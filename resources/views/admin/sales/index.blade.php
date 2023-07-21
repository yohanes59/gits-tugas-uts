@extends('layouts.app')

@section('title', 'Sales - Beranda')

@section('content')
    <h3>Beranda Penjualan</h3>
    <a href="" class="btn btn-info my-3">Cetak Laporan</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover border">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $item)
                    <tr>
                        <th class="py-3 align-middle">{{ $loop->iteration }}</th>
                        <td class="py-3 align-middle">{{ $item->category_name }}</td>
                        <td class="py-3 align-middle">{{ $item->product_name }}</td>
                        <td class="py-3 align-middle">{{ $item->total_quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- pagination --}}
    <div class="d-flex mb-3 justify-content-center">
        {!! $sales->links() !!}
    </div>
@endsection
