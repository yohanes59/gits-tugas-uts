@extends('layouts.app')

@section('title', 'Akun Kasir')

@section('content')
    <h3>Daftar Akun Kasir</h3>
    <a href="{{ url('/admin/register') }}" class="btn btn-primary my-3">Tambah Akun Baru</a>

    {{-- alert --}}
    @if ($message = Session::get('alert'))
        <div class="alert alert-success py-3 alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover border">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Dibuat pada</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kasir as $item)
                    <tr>
                        <th class="py-3 align-middle">{{ $loop->iteration }}</th>
                        <td class="py-3 align-middle">{{ $item->name }}</td>
                        <td class="py-3 align-middle">{{ $item->created_at->format('d M Y H:i:s') }}</td>
                        <td class="d-flex py-4 align-middle gap-2">
                            <a href="/admin/category/{{ $item->id }}/edit" class="btn btn-sm btn-warning">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            <form action="{{ url('/admin/category/' . $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection