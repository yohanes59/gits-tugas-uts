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

    id: {{ Auth::user()->id }} | {{ Auth::user()->name }}
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

        <form action="{{ url('/cashier/cart') }}" method="POST">
            @csrf
            {{-- tampilan primitif --}}
            @foreach ($produk->groupBy('category.name') as $category => $items)
                <h4 class="fw-bold mx-4 text-dark my-3">{{ $category }}</h4>
                <div class="col-md-12">
                    <div class="d-flex flex-wrap row-gap-3">
                        @foreach ($items as $item)
                            <div class="col-md-2">
                                <div class="card">
                                    @if ($item->image != '')
                                        <img src="{{ asset('storage/images/' . $item->image) }}" class="card-img-top"
                                            height="200" alt="Gambar Produk {{ $item->name }}">
                                    @else
                                        <img src="{{ asset('img/no-image.jpg') }}" class="card-img-top" alt="...">
                                    @endif
                                    <div class="card-body">
                                        <input type="hidden" value="{{ $item->id }}" name="product_id[]">
                                        <div class="card-title">{{ $item->name }}</div>
                                        <div class="card-title fw-bold">Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </div>
                                        <div class="d-flex justify-content-between border rounded-2 overflow-hidden mb-3">
                                            <button type="button" style="max-width: 40px"
                                                class="w-100 btn btn-light text-center py-2 rounded-0 border-end"
                                                id="minus-btn">-</button>
                                            <input name="qty[]" class="w-100 text-center py-2 qty" value="0">
                                            <button type="button" style="max-width: 40px"
                                                class="w-100 text-center btn btn-light text-center py-2 rounded-0 border-start"
                                                id="plus-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-block btn-primary" id="order">Order</button>
        </form>
    </div>

@endsection
