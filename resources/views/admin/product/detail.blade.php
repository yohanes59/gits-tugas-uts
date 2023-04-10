@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
    <div class="my-4">
        <div class="d-flex align-items-center gap-2 my-3">
            <a href="{{ url('admin/product') }}" class="btn btn-success">
                <i class="fa-solid fa-chevron-left"></i> Kembali
            </a>
            <a href="/admin/product/{{ $produk->id }}/edit" class="btn btn-warning">
                <i class="fa-solid fa-edit"></i> Edit
            </a>
        </div>
        <div class="fs-5 mb-3">Detail Product</div>
        
        <div class="mt-3 row">
            <div class="col-md-4">
                <div class="mb-2">
                    <div class="fw-bold fs-6 mb-2">Nama Produk</div>
                    <div class="form-control">{{ $produk->name }}</div>
                </div>
                <div class="mb-2">
                    <div class="fw-bold fs-6 mb-2">Harga</div>
                    <div class="form-control">{{ $produk->price }}</div>
                </div>
                <div class="mb-2">
                    <div class="fw-bold fs-6 mb-2">Deskripsi</div>
                    <div class="border px-3 py-2 rounded-2 bg-white">{{ $produk->description }}</div>
                </div>
                <div class="mb-2">
                    <div class="fw-bold fs-6 mb-2">Ditambahkan pada</div>
                    <div class="form-control">{{ $produk->created_at->format('d M Y H:i:s') }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-2">
                    <div class="fw-bold fs-6 mb-2">Kategori Produk</div>
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-2 mx-2 border rounded-2 bg-white">
                        <div>{{ $produk->category->name }}</div>
                        <div>
                            <img src="{{ asset('storage/images/' . $produk->category->image) }}" alt="gambar kategori {{ $produk->category->name }}" width="30" height="30">
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="fw-bold fs-6 mb-2">Gambar Produk</div>
                    <div class="col-md-5 overflow-hidden">
                        <img class="img-fluid rounded-2" src="{{ asset('storage/images/' . $produk->image) }}" alt="gambar kategori {{ $produk->name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection