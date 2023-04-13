<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $transaction->id }}</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        .total {
            font-weight: bold;
            font-size: 16px;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Invoice #{{ $transaction->id }}</h1>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
                <tr>
                    <td>{{ App\Models\Product::find($item['product_id'])->name }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rp {{ number_format(App\Models\Product::find($item['product_id'])->price) }}</td>
                    <td>Rp {{ number_format($item['total']) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Total: Rp {{ number_format($transaction->grandtotal) }}
    </div>
</body>
</html>