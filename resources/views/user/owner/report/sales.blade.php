@extends('layouts.main.layout')

@section('styles')
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('report') }}/css/style.css">
@endsection

@section('content')
<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="h5 mb-4 text-center">Laporan Penjualan</h3>
                <form method="GET" action="#">
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
                </form>
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
                            <!-- Row 1 -->
                            <tr class="alert" role="alert">
                                <td>1</td>
                                <td>
                                    <div class="img" style="background-image: url('images/product-1.png');"></div>
                                </td>
                                <td>Spagettie Bolognesse</td>
                                <td>$44.99</td>
                                <td>3</td>
                                <td>$134.97</td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="alert" role="alert">
                                <td>2</td>
                                <td>
                                    <div class="img" style="background-image: url('images/product-1.png');"></div>
                                </td>
                                <td>Cireng</td>
                                <td>$29.99</td>
                                <td>2</td>
                                <td>$59.98</td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="alert" role="alert">
                                <td>3</td>
                                <td>
                                    <div class="img" style="background-image: url('images/product-1.png');"></div>
                                </td>
                                <td>Spagettie Bolognesse</td>
                                <td>$44.99</td>
                                <td>1</td>
                                <td>$44.99</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
