<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $transaction->id }}</title>

    <style type="text/css">
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 17cm;
            height: 27cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        .receipt_number {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
        }

        #receipt_info {
            float: left;
        }

        #receipt_info span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #receipt_info div,
        #company div {
            white-space: nowrap;
            padding-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 15px;
            text-align: center;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
            text-align: right;
            margin-top: 20px;
            margin-right: 38px;
        }

        footer {
            color: #5D6975;
            width: 100%;
            position: absolute;
            margin-top: 20px;
            border-top: 1px solid #C1CED9;
            border-bottom: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
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
