<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        /* .receipt {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
        } */
        .header, .footer {
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .details, .items {
            width: 100%;
            margin: 20px 0;
        }
        .items th, .items td {
            padding: 8px;
            text-align: left;
        }
        .items th {
            border-bottom: 1px solid #ccc;
        }
        .totals {
            width: 100%;
            margin-top: 20px;
        }
        .totals th, .totals td {
            padding: 8px;
            text-align: right;
        }
        .totals th {
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
            <h1>D'Podjok Garden</h1>
            <p>123 Main Street, City, State, ZIP Code</p>
            <p>Phone: (123) 456-7890</p>
        </div>
        <div class="details">
            <p>No Pesanan #: {{ $order->no_pesanan }}</p>
            <p>Pelanggan : {{ $order->pemesan != null ? $order->pemesan : $order->customer->nama }}</p>
            <p>Metode Bayar: {{ $payment->payment_type }}</p>
            <p>Tanggal: {{ $payment->transaction_time }}</p>
        </div>
        <hr>
        <table class="items">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($order->detailOrders as $do)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $do->product->nama }}</td>
                    <td>{{ $do->jumlah }}</td>
                    <td>{{ $do->harga }}</td>
                    <td>{{ $do->total_harga }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan=5>No Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <hr>
        <table class="totals">
            <tr>
                <th>Total Bayar:</th>
                <th>{{ $payment->total_bayar }}</th>
            </tr>
            <tr>
                <th>Bayar:</th>
                <th>{{ $payment->uang }}</th>
            </tr>
            <tr>
                <th>Kembali:</th>
                <th>{{ $payment->kembali }}</th>
            </tr>
        </table>
        <br>
        <div class="footer">
            <p>Terimakasih sudah berbelanja di toko kami!</p>
            <p>Selamat menikmati!</p>
            <p>Kunjungi web kami: www.dpodjok-garden.com</p>
        </div>
    </div>
</body>
</html>
