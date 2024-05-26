<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        .thead-primary {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        .h5 {
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <section class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3 class="h5 mb-4 text-center">{{ $title }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($salesData as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><img src="{{ asset('images/' . $data->image) }}" alt="{{ $data->nama }}" width="50"></td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ number_format($data->harga, 2) }}</td>
                                            <td>{{ $data->total_quantity }}</td>
                                            <td>{{ number_format($data->total_sales, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
