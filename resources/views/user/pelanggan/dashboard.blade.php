@extends('layouts.customer.layout')

@section('title')
    Dashboard
@endsection

@section('styles')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }
    .card {
        margin-bottom: 20px;
    }
    .bg-light-yellow {
        background-color: #ffefc5;
    }
    .bg-light-blue {
        background-color: #d6f4ff;
    }
    .bg-light-brown {
        background-color: #fff0d6;
    }
    .bg-light-green {
        background-color: #dff4d6;
    }
    .sales-chart, .top-products {
        height: 300px;
    }
    .product-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }
    .activity-product-img {
        width: 30px;
        height: 30px;
        object-fit: cover;
        margin-right: 10px;
    }
    .sales-chart {
        height: 300px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left Column -->
        <div class="col-md-3">
            <!-- Track Order -->
            <div class="card bg-light-yellow">
                <div class="card-body">
                    <h5 class="card-title">Selamat Datang, {{ Auth::user()->name }}!</h5>
                    @if($totalPesananMenungguPembayaran > 0)
                        <small>Anda memiliki {{ $totalPesananMenungguPembayaran }} pesanan yang belum dibayar</small>
                    @else
                        <small>Anda tidak memiliki pesanan yang menunggu pembayaran</small>
                    @endif
                </div>
            </div>
            <!-- New Orders List -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Aktivitas Terbaru</h5>
                    <ul class="list-group">
                        @forelse ($pesananTerbaru as $o)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">

                                <img src="{{ asset('images/details/'.$o->detailOrders->pluck('image')->first()) }}" class="activity-product-img" alt="Product">
                                <div>
                                    <strong>#{{ $o->no_pesanan }}</strong><br>
                                    <small>{{ $o->jumlah_pesanan }} item(s)</small><br>
                                    <small>{{ $o->updated_at }}</small>
                                </div>
                            </div>
                            <span>{{ $o->total_harga }}</span>
                        </li>
                        @empty
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div>
                                    Tidak ada aktivitas terbaru.
                                </div>
                            </div>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <!-- Right Column -->
        <div class="col-md-9">
            <div class="row">
                <!-- Summary Cards -->
                <div class="col-md-3">
                    <div class="card bg-light-yellow">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pesanan Hari Ini</h5>
                            <p>{{ $totalPesananHariIni }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light-brown">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pesanan Diproses</h5>
                            <p>{{ $totalPesananDiproses }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light-blue">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pesanan Selesai</h5>
                            <p>{{ $totalPesananSelesai }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light-green">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pesanan Diterima</h5>
                            <p>{{ $totalPesananDiterima }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Pembelian minggu ini</h3>
                    <div class="bg-light">
                        <canvas id="weeklySalesChart" class="sales-chart"></canvas>
                    </div>
                </div>
            </div>
            <!-- Top Products -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('weeklySalesChart').getContext('2d');
        var weeklyOrders = @json($weeklyOrders);

        var labels = [];
        var data = [];

        var currentDate = new Date();
        var startOfWeek = new Date(currentDate);
        startOfWeek.setDate(currentDate.getDate() - currentDate.getDay() + (currentDate.getDay() === 0 ? -6 : 1)); // Monday of current week
        startOfWeek.setHours(0, 0, 0, 0); // Start of the day

        var endOfWeek = new Date(startOfWeek);
        endOfWeek.setDate(startOfWeek.getDate() + 6); // Sunday of current week
        endOfWeek.setHours(23, 59, 59, 999); // End of the day

        // Loop through each day of the current week
        for (var d = new Date(startOfWeek); d <= endOfWeek; d.setDate(d.getDate() + 1)) {
            var dateString = d.toISOString().split('T')[0];
            labels.push(dateString);

            // Find corresponding order for each date
            var order = weeklyOrders.find(order => order.date === dateString);
            data.push(order ? order.total : 0);
        }

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Pembelian',
                    data: data,
                    backgroundColor: '#E3E1D9',
                    borderColor: '#E3E1D9',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection
