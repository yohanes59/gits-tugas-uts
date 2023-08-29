@extends('layouts.app')
@section('title', 'Category - Edit')
@section('content')
    <div class="d-flex align-items-center gap-3 my-3">
        <a href="{{ url('admin/category') }}" class="btn btn-success">
            <i class="fa-solid fa-chevron-left"></i> Kembali
        </a>
        <div class="fs-4">Edit Kategori</div>
    </div>

    <div class="col-md-5 mt-4">
        <form action="{{ url('admin/category/' . $kategori->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="my-2">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" value="{{ $kategori->name }}" id="nama_kategori" name="nama_kategori"
                    class="form-control @error('nama_kategori') is-invalid @enderror">
                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                @if (isset($kategori) && $kategori->image)
                    <img id="image-preview" src="{{ route('image.displayImage', $kategori->image) }}" width="160px"
                        height="150px">
                @else
                    <img id="image-preview">
                @endif
            </div>

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