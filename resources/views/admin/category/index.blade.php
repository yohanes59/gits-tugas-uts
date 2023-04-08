@extends('layouts.app')

@section('title', 'Category - Beranda')

@section('content')
    {{-- {{ $kategori }} --}}
    <h1>Beranda Category</h1>
    <a href="{{ url('/admin/category/create') }}" class="btn btn-primary my-3">Tambah Data</a>
    <div class="table-responsive">
        <table class="table table-warning">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Dibuat pada</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            @if ($item->image != '')
                                <img src="{{ asset('storage/images/' . $item->image) }}"
                                    alt="gambar kategori {{ $item->name }}" width="60" height="60">
                            @else
                                <img src="{{ asset('img/no-image.jpg') }}" alt="gambar kategori {{ $item->name }}"
                                    width="60" height="60">
                            @endif
                        </td>
                        <td>{{ $item->created_at->format('d M Y H:i:s') }}</td>
                        <td class="d-flex gap-2">
                            <a href="/admin/category/{{ $item->id }}/edit" class="btn btn-primary">Edit</a>
                            <form action="{{ url('/admin/category/' . $item->id) }}" method="POST">
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
