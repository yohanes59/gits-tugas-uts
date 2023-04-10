@extends('layouts.app')

@section('title', 'Kasir - Cart')

@section('content')
    {{-- alert --}}
    @if ($message = Session::get('alert'))
    <div class="alert alert-success py-3 alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>    
    @endif

    <div class="mt-3 mb-5">
        <div class="d-flex justify-content-between mb-3">
            <div class="fs-5">Pilih produk</div>
            <a href="#" class="d-flex align-items-center gap-2 fs-5">
                <div class="fs-6">Cart</div>
                <div>
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </a>
        </div>

        {{-- tampilan primitif --}}
        {{-- Menu Hot --}}
        <h4 class="fw-bold mx-4 text-dark">Hot</h4>
        <div class="col-md-12">
            <div class="d-flex flex-wrap row-gap-3">
                @foreach ($menu_hot as $item_hot)
                    <div class="col-md-2">
                        <div class="card">
                            @if ($item_hot->image != '')
                                <img src="{{ asset('storage/images/' . $item_hot->image) }}" class="card-img-top" height="200" alt="Gambar Produk {{ $item_hot->name }}">
                            @else
                                <img src="{{ asset('img/no-image.jpg') }}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                            <div class="card-title">{{ $item_hot->name }}</div>
                            <div class="card-title fw-bold">Rp {{ number_format($item_hot->price, 0, ',', '.') }}</div>
                            <div class="d-flex justify-content-between border rounded-2 overflow-hidden mb-3">
                                <button type="button" style="max-width: 40px" class="w-100 btn btn-light text-center py-2 rounded-0 border-end">-</button>
                                <div class="w-100 text-center py-2">1</div>
                                <button type="button" style="max-width: 40px" class="w-100 text-center btn btn-light text-center py-2 rounded-0 border-start">+</button>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>    
                @endforeach
            </div>
        </div>

        {{-- Menu Cold --}}
        <h4 class="fw-bold mx-4 text-dark mt-4">Cold</h4>
        <div class="col-md-12">
            <div class="d-flex flex-wrap row-gap-3">
                @foreach ($menu_cold as $item_cold)
                    <div class="col-md-2">
                        <div class="card">
                            @if ($item_cold->image != '')
                                <img src="{{ asset('storage/images/' . $item_cold->image) }}" class="card-img-top" height="200" alt="Gambar Produk {{ $item_cold->name }}">
                            @else
                                <img src="{{ asset('img/no-image.jpg') }}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                            <div class="card-title">{{ $item_cold->name }}</div>
                            <div class="card-title fw-bold">Rp {{ number_format($item_cold->price, 0, ',', '.') }}</div>
                            <div class="d-flex justify-content-between border rounded-2 overflow-hidden mb-3">
                                <button type="button" style="max-width: 40px" class="w-100 btn btn-light text-center py-2 rounded-0 border-end">-</button>
                                <div class="w-100 text-center py-2">1</div>
                                <button type="button" style="max-width: 40px" class="w-100 text-center btn btn-light text-center py-2 rounded-0 border-start">+</button>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>    
                @endforeach
            </div>
        </div>

        {{-- Menu Snack --}}
        <h4 class="fw-bold mx-4 text-dark mt-4">Snack</h4>
        <div class="col-md-12">
            <div class="d-flex flex-wrap row-gap-3">
                @foreach ($menu_snack as $item_snack)
                    <div class="col-md-2">
                        <div class="card">
                            @if ($item_snack->image != '')
                                <img src="{{ asset('storage/images/' . $item_snack->image) }}" class="card-img-top" height="200" alt="Gambar Produk {{ $item_snack->name }}">
                            @else
                                <img src="{{ asset('img/no-image.jpg') }}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                            <div class="card-title">{{ $item_snack->name }}</div>
                            <div class="card-title fw-bold">Rp {{ number_format($item_snack->price, 0, ',', '.') }}</div>
                            <div class="d-flex justify-content-between border rounded-2 overflow-hidden mb-3">
                                <button type="button" style="max-width: 40px" class="w-100 btn btn-light text-center py-2 rounded-0 border-end">-</button>
                                <div class="w-100 text-center py-2">1</div>
                                <button type="button" style="max-width: 40px" class="w-100 text-center btn btn-light text-center py-2 rounded-0 border-start">+</button>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>    
                @endforeach
            </div>
        </div>
    </div>
@endsection