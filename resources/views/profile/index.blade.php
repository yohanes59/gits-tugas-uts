@extends('layouts.app')

@section('title', 'Profile Kasir')

@section('content')
    <div class="d-flex align-items-center gap-3 my-3">
        <a href="{{ url('cashier/order') }}" class="btn btn-success">
            <i class="fa-solid fa-chevron-left"></i> Kembali
        </a>
        <div class="fs-4">Edit Akun</div>
    </div>

    {{-- alert --}}
    @if ($message = Session::get('alert'))
        <div class="alert alert-success py-3 alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    @endif

    <div class="row">
        <div class="col-md-5">
            <form action="{{ url('/profile/'.$users->id) }}" method="POST">
                @csrf
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="m-0">Ubah data</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $users->name }}" required>
                            @error('name')
                                <div id="nameHelp" class="text-danger fs-6">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection