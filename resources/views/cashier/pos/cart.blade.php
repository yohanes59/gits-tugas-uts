@extends('layouts.app')

@section('title', 'Kasir - Cart')

@section('content')
    <section class="h-100 gradient-custom">
        <div class="container py-5">
            <h5 class="mb-3"><a href="{{ url('/cashier/order') }}" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Kembali</a>
            </h5>
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Keranjang</h5>
                        </div>
                        <div class="card-body">
                            <!-- Single item -->
                            @php
                                $grandTotal = 0;
                            @endphp
                            @foreach ($keranjang as $item)
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                            data-mdb-ripple-color="light">
                                            <img src="{{ asset('storage/images/' . $products->where('id', $item['product_id'])->first()->image) }}"
                                                alt="" class="w-100" width="100" height="100">
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong>{{ $products->where('id', $item['product_id'])->first()->name }}</strong>
                                        </p>

                                        <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                        <div class="d-flex mb-4" style="max-width: 300px">
                                            {{-- <button class="btn btn-primary px-3 me-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button> --}}

                                            <div class="form-outline">
                                                <label class="form-label" for="form1">Quantity</label>
                                                <input id="form1" min="0" name="quantity"
                                                    value="{{ $item['quantity'] }}" type="number" class="form-control"
                                                    readonly />
                                            </div>
                                            <div class="d-flex mb-4" style="max-width: 300px">

                                                {{-- <button class="btn btn-primary px-3 ms-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button> --}}
                                                <div class="form-outline">
                                                    <label class="form-label" for="form2">Harga</label>
                                                    <input id="form2" min="0" name="harga" id="harga"
                                                        value="{{ $item['total'] }}" type="number" class="form-control"
                                                        readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $grandTotal += $item['total'];
                                @endphp
                            @endforeach

                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Transaksi</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Grand Total</strong>
                                    </div>
                                    <div id="grandtotal">{{ $grandTotal }}</div>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Bayar</strong>
                                    </div>
                                    <input type="number" id="bayar" width="100">
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Kembali</strong>
                                    </div>
                                    <div id="kembali">0</div>
                                </li>
                            </ul>

                            <button type="button" class="btn btn-primary btn-lg btn-block">
                                Bayar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const grandtotal = document.getElementById('grandtotal');
        const bayarInput = document.getElementById('bayar');
        const sisaUang = document.getElementById('kembali');

        bayarInput.addEventListener('input', function() {
            const bayar = parseInt(bayarInput.value);
            const kembalian = bayar - grandtotal.textContent;
            sisaUang.textContent = kembalian;
        });
    });
</script>
