<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('report') }}/css/style.css">
</head>
<body>
    <section class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3 class="h5 mb-4 text-center">Laporan Penjualan</h3>
                    {{-- <form method="GET" action="{{ route('check.report.sales') }}">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label for="start_date">Start Date:</label>
                                <input type="date" name="start_date" class="form-control mb-2" id="start_date" required>
                            </div>
                            <div class="col-auto">
                                <label for="end_date">End Date:</label>
                                <input type="date" name="end_date" class="form-control mb-2" id="end_date" required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Filter</button>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                 @if(isset($salesData) && !empty($salesData))
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
                @else
                <div class="alert alert-warning mt-4">
                    No sales data found for the selected date range.
                </div>
                @endif
                </div>
            </div>
        </div>
    </section>
</body>
</html>

