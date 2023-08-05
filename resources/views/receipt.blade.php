<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $transaction->id }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/receipt.css') }}">
    <script>
        window.print();
        window.onafterprint = function() {
            window.location.href = '/cashier/order';
        }
    </script>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ asset('img/store.png') }}">
            <h1>Cafe XYZ</h1>
        </div>
        <h2 class="receipt_number">Receipt #{{ $transaction->id }}</h2>
        <div id="receipt_info">
            <div><span>Cashier :</span> {{ Auth::user()->name }}</div>
            <div><span>Tanggal :</span> {{ date('d F Y', strtotime($transaction->created_at)) }}</div>
            <div><span>Jam :</span> {{ $transaction->created_at->format('H:i:s') }}</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="desc">PRODUCT NAME</th>
                    <th>PRICE</th>
                    <th>QTY</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <!-- product -->
                @foreach ($cart as $item)
                    <tr>
                        <td class="desc">{{ App\Models\Product::find($item['product_id'])->name }}</td>
                        <td class="unit">Rp {{ number_format(App\Models\Product::find($item['product_id'])->price) }}
                        </td>
                        <td class="qty">{{ $item['quantity'] }}</td>
                        <td>Rp {{ number_format($item['total']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <div class="grand total">GRAND TOTAL : Rp {{ number_format($transaction->grandtotal) }}</div>
        </div>
    </main>
    <footer>
        Terima Kasih - Silahkan datang lagi!!
    </footer>
</body>

</html>
