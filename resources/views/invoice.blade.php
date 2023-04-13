<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice #</title>

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

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
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
            padding: 20px;
            text-align: right;
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

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
            margin-top: 50px;

            padding-left: 18px;
            border-left: 4px solid #0087C3;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
            text-align: right;
            margin-top: 20px;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ asset('img/coffee.png') }}">
        </div>
        <h1>INVOICE #{{ $transaction->id }}</h1>
        <div id="company" class="clearfix">
            <div>Kelompok 11</div>
        </div>
        <div id="project">
            <div><span>PROJECT</span> Website POS - Coffee Shop</div>
            <div><span>TASK</span> Tugas UTS</div>
            <div><span>MITRA</span> PT Gits Indonesia</div>
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
                        <td class="total">Rp {{ number_format($item['total']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <div class="grand total">GRAND TOTAL</div>
            <div class="grand total">Rp {{ number_format($transaction->grandtotal) }}</div>
        </div>
        <div id="thanks">Thank you for your order!</div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
