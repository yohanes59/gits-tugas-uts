@extends('layouts.app')

@section('title', 'Product - Beranda')

@section('content')
    <h3>Beranda Product</h3>
    <a href="{{ url('/admin/product/create') }}" class="btn btn-primary my-3">Tambah Data</a>

    <div class="table-responsive">
        <table class="table table-striped table-hover border">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Image</th>.
                    <th scope="col">Nama</th>.
                    <th scope="col">Harga</th>
                    <th scope="col">Dibuat pada</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                    <tr>
                        <th class="py-3 align-middle">{{ $loop->iteration }}</th>
                        <td class="py-3 align-middle">{{ $item->category->name }}</td>
                        <td class="py-3 align-middle">
                            @if ($item->image != '')
                                <img src="{{ asset('storage/images/' . $item->image) }}" alt="gambar kategori {{ $item->name }}" width="40"
                                    height="40">
                            @else
                                <img src="{{ asset('img/no-image.jpg') }}" alt="gambar kategori {{ $item->name }}"
                                    width="40" height="40">
                            @endif
                        </td>
                        <td class="py-3 align-middle">{{ $item->name }}</td>
                        <td class="py-3 align-middle">{{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="py-3 align-middle">{{ $item->created_at->format('d M Y H:i:s') }}</td>
                        <td class="d-flex py-3 align-middle gap-2">
                            <a href="" class="btn btn-success">Detail</a>
                            <a href="/admin/product/{{ $item->id }}/edit" class="btn btn-primary">Edit</a>
                            <form action="{{ url('/admin/product/' . $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"
                                    onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
