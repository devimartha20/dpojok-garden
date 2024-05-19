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
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="h5 mb-4 text-center">Laporan Penjualan</h3>
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
                                    <div class="img" style="background-image: url(images/product-1.png);"></div>
                                </td>
                                <td>Spagettie Bolognesse</td>
                                <td>$44.99</td>
                                <td> 3</td>
                                <td>$89.98</td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="alert" role="alert">
                                <td>1</td>
                                <td>
                                    <div class="img" style="background-image: url(images/product-1.png);"></div>
                                </td>
                                <td>Cireng</td>
                                <td>$44.99</td>
                                <td> 3</td>
                                <td>$89.98</td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="alert" role="alert">
                                <td>1</td>
                                <td>
                                    <div class="img" style="background-image: url(images/product-1.png);"></div>
                                </td>
                                <td>Spagettie Bolognesse</td>
                                <td>$44.99</td>
                                <td> 3</td>
                                <td>$89.98</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
{{-- <script src="{{asset('report')}}/js/jquery.min.js"></script> --}}
    {{-- <script src="{{asset('report')}}/js/popper.js"></script>
    <script src="{{asset('report')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('report')}}/js/main.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vedd3670a3b1c4e178fdfb0cc912d969e1713874337387" integrity="sha512-EzCudv2gYygrCcVhu65FkAxclf3mYM6BCwiGUm6BEuLzSb5ulVhgokzCZED7yMIkzYVg65mxfIBNdNra5ZFNyQ==" data-cf-beacon='{"rayId":"88620795385655c6","version":"2024.4.1","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script> --}}
@endsection
