@extends('layouts.app')

@section('title', 'Category - Tambah')

@section('content')
    <form action="{{ url('/admin/category') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="my-2">
            <label for="nama_kategori" class="form-label">Tambah Kategori</label>
            <input type="text" id="nama_kategori" name="nama_kategori"
                class="form-control @error('nama_kategori') is-invalid @enderror">
            @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div><img id="image-preview"></div>

        <div class="my-2">
            <label for="gambar" class="form-label">Image</label>
            <input type="file" id="gambar" class="form-control" name="gambar" onchange="previewImage()">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

<script></script>
