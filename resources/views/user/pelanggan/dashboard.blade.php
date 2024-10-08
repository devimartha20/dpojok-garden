@extends('layouts.customer.layout')

@section('title', 'Dashboard')

@section('styles')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0; /* Reset body margin */
        padding: 0; /* Reset body padding */
    }
    .container-fluid {
            margin-top: 20px; /* Adjust top margin */
            margin-bottom: 20px; /* Adjust bottom margin */
            margin-left: 10px; /* Adjust left margin */
            margin-right: 10px; /* Adjust right margin */
        }
    .card {
        margin-bottom: 20px;
        border: none; /* Remove default card borders */
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Add subtle shadow */
    }
    .bg-light-yellow {
        background-color: #ffefc5;
    }
    .bg-light-blue {
        background-color: #d6f4ff;
    }
    .bg-light-brown {
        background-color: #f5deb3; /* Adjusted light brown color */
    }
    .bg-light-green {
        background-color: #dff4d6;
    }
    .sales-chart {
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
    .card-title {
        font-size: 1.2rem; /* Adjust card title font size */
        font-weight: bold;
    }
    .card-body {
        padding: 20px;
    }
    .display-4 {
        font-size: 2.5rem; /* Adjust display-4 font size */
        font-weight: bold;
    }
    .text-muted {
        font-size: 1.5rem; /* Adjust text-muted font size */
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                        <li class="list-group-item">
                            <div class="text-muted">Tidak ada aktivitas terbaru.</div>
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
                    <div class="card bg-light-brown">
                        <div class="card-body text-center">
                            <i class="fa fa-calendar-minus-o fa-2x text-brown mb-2" aria-hidden="true"></i>
                            <h5 class="card-title mb-3">Pesanan Hari Ini</h5>
                            <p class="display-4">{{ $totalPesananHariIni }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-light-brown">
                        <div class="card-body text-center">
                            <i class="fa fa-refresh fa-2x text-brown mb-2" aria-hidden="true"></i>
                            <h5 class="card-title mb-3">Pesanan Diproses</h5>
                            <p class="display-4">{{ $totalPesananDiproses }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-light-brown">
                        <div class="card-body text-center">
                            <i class="fa fa-calendar-check-o fa-2x text-brown mb-2" aria-hidden="true"></i>
                            <h5 class="card-title mb-3">Pesanan Selesai</h5>
                            <p class="display-4">{{ $totalPesananSelesai }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-light-brown">
                        <div class="card-body text-center">
                            <i class="fa fa-cubes fa-2x text-brown mb-2" aria-hidden="true"></i>
                            <h5 class="card-title mb-3">Pesanan Diterima</h5>
                            <p class="display-4">{{ $totalPesananDiterima }}</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Sales Chart -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Pembelian Minggu Ini</h3>
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
                    backgroundColor: '#F5DEB3',
                    borderColor: '#F5DEB3',
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
