@extends('layouts.app')
@section('title', 'Transaction - List')
@section('content')
    <h3>List Transaksi</h3>
    <button class="btn btn-info my-3 cetak">Cetak Laporan</button>

    <div class="table-responsive mt-3 cetak-area">
        <table class="table table-hover border">
            <thead class="bg-gray-300 text-dark">
                <tr class="fw-semibold">
                    <td>Tanggal</td>
                    <td>ID</td>
                    <td>Nama Kasir</td>
                    <td>Total</td>
                    <td class="aksi">Action</td>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($transaksi as $item)
                    <tr>
                        <td class="py-3 align-middle">{{ $item->created_at->format('d M Y H:i:s') }}</td>
                        <td class="py-3 align-middle">{{ $item->id }}</td>
                        <td class="py-3 align-middle">{{ $item->users->name }}</td>
                        <td class="py-3 align-middle">Rp {{ number_format($item->grandtotal, 0, ',', '.') }}</td>
                        <td class="d-flex py-3 align-middle gap-2 aksi">
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

    {{-- pagination --}}
    <div class="d-flex mb-3 justify-content-center">
        {!! $transaksi->links() !!}
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let tombolCetak = document.querySelector('.cetak');
            tombolCetak.addEventListener('click', function() {
                let elemenCetak = document.querySelector('.cetak-area');
                let kolomAction = document.querySelectorAll('.aksi');

                // Menghapus kolom Action
                kolomAction.forEach(function(element) {
                    element.style.display = 'none';
                });

                let printWindow = window.open('', '_blank');

                printWindow.document.open();
                printWindow.document.write('<title>Cetak Transaksi</title>');
                printWindow.document.write(
                    '<style>@media print { .table { border-collapse: collapse; width: 100%; } .table td, .table th { border: 1px solid black; padding: 0.5rem; } }</style>'
                );
                printWindow.document.write('<h1 style="text-align: center;">Laporan Transaksi</h1>');
                printWindow.document.write(elemenCetak.innerHTML);
                printWindow.document.close();
                printWindow.print();
                printWindow.close();

                // Mengembalikan tampilan kolom Action setelah mencetak
                kolomAction.forEach(function(element) {
                    element.style.display = '';
                });
            });
        });
    </script>
@endpush
