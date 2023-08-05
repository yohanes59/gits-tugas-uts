@extends('layouts.app')
@section('title', 'Sales - Beranda')
@section('content')
    <h3>Beranda Penjualan</h3>
    <button class="btn btn-info my-3 cetak">Cetak Laporan</button>

    <div class="table-responsive cetak-area">
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


@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let tombolCetak = document.querySelector('.cetak');
            tombolCetak.addEventListener('click', function() {
                let elemenCetak = document.querySelector('.cetak-area');

                let printWindow = window.open('', '_blank');

                printWindow.document.open();
                printWindow.document.write('<html><head><title>Cetak Penjualan</title>');
                printWindow.document.write(
                    '<style>@media print { .table { border-collapse: collapse; width: 100%; } .table td, .table th { border: 1px solid black; padding: 0.5rem; } }</style>'
                );
                printWindow.document.write('</head><body>');
                printWindow.document.write('<h1 style="text-align: center;">Laporan Penjualan</h1>');
                printWindow.document.write(elemenCetak.innerHTML);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
                printWindow.close();

            });
        });
    </script>
@endpush
