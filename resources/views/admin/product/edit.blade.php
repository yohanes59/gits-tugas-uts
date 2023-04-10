@extends('layouts.app')

@section('title', 'Product - Edit')

@section('content')
    <div class="d-flex align-items-center gap-3 my-3">
        <a href="{{ url('admin/product') }}" class="btn btn-success">
            <i class="fa-solid fa-chevron-left"></i> Kembali
        </a>
        <div class="fs-4">Edit Product</div>
    </div>

    <div class="col-md-5 my-4">
        <form action="{{ url('admin/product/' . $produk->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="my-2">
                <label for="kategori_produk" class="form-label">Category Product</label>
                <select name="kategori_produk" id="kategori_produk" class="form-control form-select">
                    <option selected disabled hidden>Pilih Kategori Produk</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}"
                            {{ isset($produk) ? ($produk->category_id == $item->id ? 'selected' : '') : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                @error('kategori_produk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2">
                <label for="nama_produk" class="form-label">Nama Product</label>
                <input type="text" id="nama_produk" name="nama_produk" value="{{ $produk->name }}"
                    class="form-control @error('nama_produk') is-invalid @enderror">
                @error('nama_produk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2">
                <label for="harga" class="form-label">Harga Product</label>
                <input type="number" id="harga" name="harga" value="{{ $produk->price }}"
                    class="form-control @error('harga') is-invalid @enderror">
                @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-2">
                <label for="deskripsi" class="form-label">Deskripsi Product</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror">{{ $produk->description }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if (isset($produk) && $produk->image)
                <img id="image-preview" src="{{ asset('storage/images/' . $produk->image) }}" width="160px"
                    height="150px">
            @else
                <img id="image-preview">
            @endif

            <div class="my-2">
                <label for="gambar" class="form-label">Image</label>
                <input type="file" id="gambar" class="form-control" name="gambar" onchange="previewImage()">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection
