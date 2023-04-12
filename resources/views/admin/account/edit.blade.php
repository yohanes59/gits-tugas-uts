@extends('layouts.app')

@section('title', 'Edit Kasir')

@section('content')
    <div class="d-flex align-items-center gap-3 my-3">
        <a href="{{ url('admin/cashier-account') }}" class="btn btn-success">
            <i class="fa-solid fa-chevron-left"></i> Kembali
        </a>
        <div class="fs-4">Edit Akun</div>
    </div>
    @csrf
    <form action="{{ url('/admin/cashier-account') }}" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{isset($user)}}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ isset($user) ? $user->password : '' }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection