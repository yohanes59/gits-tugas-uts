@extends('layouts.app')

@section('title', 'Kasir - Cart')

@section('content')
    <section class="h-100 gradient-custom">
        <div class="px-3 py-3">
            <h5 class="mb-3"><a href="{{ url('/cashier/order') }}" class="text-body">
                    <i class="fas fa-chevron-left me-2"></i>Kembali</a>
            </h5>
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4 shadow">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Keranjang</h5>
                        </div>
                        <div class="card-body">
                            <!-- Single item -->
                            @php
                                $grandTotal = 0;
                            @endphp
                            @forelse ($keranjang as $item)
                                <div class="row py-2">
                                    <div class="col-md-2 mb-4 mb-lg-0">
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                            data-mdb-ripple-color="light">
                                            <img src="{{ asset('storage/images/' . $products->where('id', $item['product_id'])->first()->image) }}"
                                                alt="" class="w-100 rounded-1" height="150">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4 mb-lg-0">
                                        <div>Nama Produk</div>
                                        <p class="mt-2"><strong>{{ $products->where('id', $item['product_id'])->first()->name }}</strong></p>
                                    </div>

                                    <div class="col-md-4 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                        <div class="d-flex mb-4 gap-3" style="max-width: 300px">
                                            <div class="form-outline">
                                                <label class="form-label" for="form1">Quantity</label>
                                                <input id="form1" min="0" name="quantity"
                                                    value="{{ $item['quantity'] }}" type="number" class="form-control"
                                                    readonly />
                                            </div>
                                            <div class="form-outline">
                                                <label class="form-label" for="form2">Harga</label>
                                                <input id="form2" min="0" name="harga" id="harga"
                                                    value="{{ $item['total'] }}" type="number" class="form-control"
                                                    readonly />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 mb-4 mb-lg-0">
                                        <div class="text-center">Action</div>
                                        <div class="pt-2 d-flex justify-content-center">
                                            <form action="{{ url('/cashier/cart/' . $item['product_id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')" class="btn text-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom"></div>
                                @php
                                    $grandTotal += $item['total'];
                                @endphp

                            @empty
                                <div class="col-md-12">
                                    <div class="text-center fs-6 text-gray-600">Belum ada produk</div>
                                </div>
                            @endforelse

                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Transaksi</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('checkout') }}" method="POST">
                                @csrf
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="fw-bold text-black">Grand Total</td>
                                        <td>=></td>
                                        <td class="text-end">
                                            <div id="grandtotal">{{ $grandTotal }}</div>
                                            <input type="hidden" name="grandtotal" value="{{ $grandTotal }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-black pt-3">Bayar</td>
                                        <td class="pt-3">=></td>
                                        <td class="d-flex justify-content-end align-items-center">
                                            <input type="number" id="bayar" class="form-control"
                                                style="max-width: 100px" min="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold text-black">Kembali</td>
                                        <td>=></td>
                                        <td class="text-end">
                                            <div id="kembali">0</div>
                                        </td>
                                    </tr>
                                </table>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="return confirm('Apakah Anda Ingin Menyelesaikan Transaksi ini?')">Bayar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
