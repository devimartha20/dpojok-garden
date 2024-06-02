@extends('layouts.main.layout')
@section('title')
    Dashboard
@endsection
@section('styles')

@endsection
@section('content')
<div class="row">

    <!-- order-card start -->
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Masuk</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>{{ $total_pesanan_masuk }}</span></h2>
                {{-- <p class="m-b-0">Pesanan Masuk<span class="f-right">351</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Selesai</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>{{ $total_pesanan_selesai }}</span></h2>
                {{-- <p class="m-b-0">Pesanan Diterima<span class="f-right">351</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Produk Terjual</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>{{ $total_produk_terjual }}</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">213</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Pendapatan</h6>
                <h2 class="text-right"><i class="ti-reload f-left"></i><span>Rp. {{ number_format($total_pendapatan) }}</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">Rp.1.200.000</span></p> --}}
            </div>
        </div>
    </div>
    {{-- <div class="col-md-6 col-xl-3">
        <div class="card bg-c-pink order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Profit</h6>
                <h2 class="text-right"><i class="ti-wallet f-left"></i><span>Rp.15.000.000</span></h2>
                <p class="m-b-0">This Month<span class="f-right">Rp.500.000</span></p>
            </div>
        </div>
    </div> --}}
    <!-- order-card end -->

    <!-- statustic and process start -->
    {{-- <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Statistik</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <canvas id="Statistics-chart" height="200"></canvas>
            </div>
        </div>
    </div> --}}
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Grafik Pemesanan</h5>
            </div>
            <div class="card-block">
                <span class="d-block text-c-blue f-24 f-w-600 text-center">{{ $total_pesanan_online + $total_pesanan_offline }}</span>
                <canvas id="myChart" height="100"></canvas>
                <div class="row justify-content-center m-t-15">
                    <div class="col-auto b-r-default m-t-5 m-b-5">
                        <h4>
                            {{ $total_pesanan_online }}
                        </h4>
                        <p class="text-success m-b-0"><i class="ti-hand-point-up m-r-5"></i>Online</p>
                    </div>
                    <div class="col-auto m-t-5 m-b-5">
                        <h4>
                            {{ $total_pesanan_offline }}
                        </h4>
                        <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Offline</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- statustic and process end -->
    <!-- tabs card start -->
    <div class="col-sm-12">
        <div class="card tabs-card">
            <div class="card-block p-0">
                <div class="card-header">
                    <h5>Aktivitas Terbaru</h5>
                </div>
                <!-- Nav tabs -->
                {{-- <ul class="nav nav-tabs md-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#home3" role="">Recent Activities</a>
                        <div class="slide"></div>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Security</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-play-circle"></i>Entertainment</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-database"></i>Big Data</a>
                        <div class="slide"></div>
                    </li> --}}
                {{-- </ul> --}}
                <!-- Tab panes -->
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pesanan_terbaru as $pt)
                                    <tr>
                                        <td><img src="{{ asset('images/'.$pt->product->image) }}" alt="prod img" class="img-fluid"></td>
                                        <td>{{ $pt->product->nama }}</td>
                                        <td>{{ $pt->jumlah }}</td>
                                        <td>

                                            @if ($pt->order->progress == 'menunggu')
                                                <span class="label label-warning">{{ $pt->order->progress }}</span>
                                            @elseif($pt->order->progress == 'diproses')
                                            <span class="label label-info">{{ $pt->order->progress }}</span>
                                            @elseif($pt->order->progress == 'selesai')
                                            <span class="label label-success">{{ $pt->order->progress }}</span>
                                            @elseif($pt->order->progress == 'diterima')
                                            <span class="label label-primary">{{ $pt->order->progress }}</span>
                                            @elseif($pt->order->progress == 'dibatalkan')
                                            <span class="label label-secondary">{{ $pt->order->progress }}</span>
                                            @endif

                                        </td>
                                        <td>{{ $pt->customer ? $pt->customer->nama : $pt->pemesan ?? '' }}</td>
                                        <td>{{ $pt->created_at }}</td>
                                        <td>{{ $pt->total_harga }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">No Data</td>
                                    </tr>
                                    @endforelse

                                </tbody>


                            </table>
                        </div>
                        {{-- <div class="text-center">
                            <a href="{{ route('riwayatpesan.route') }} class="btn btn-outline-primary btn-round btn-sm">Load More</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tabs card end -->

    <!-- social statustic start -->
    {{-- <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-block text-center">
                <i class="fa fa-envelope-open text-c-blue d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-c-blue">8.62k</span> Subscribers</h4>
                <p class="m-b-20">Your main list is growing</p>
                <button class="btn btn-primary btn-sm btn-round">Manage List</button>
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-block text-center">
                <i class="fa fa-twitter text-c-green d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-c-blgreenue">+40</span> Followers</h4>
                <p class="m-b-20">Your main list is growing</p>
                <button class="btn btn-success btn-sm btn-round">Check them out</button>
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-block text-center">
                <i class="fa fa-puzzle-piece text-c-pink d-block f-40"></i>
                <h4 class="m-t-20">Business Plan</h4>
                <p class="m-b-20">This is your current active plan</p>
                <button class="btn btn-danger btn-sm btn-round">Upgrade to VIP</button>
            </div>
        </div>
    </div> --}}
    <!-- social statustic end -->

    <!-- users visite and profile start -->
    {{-- <div class="col-md-4">
        <div class="card user-card">
            <div class="card-header">
                <h5>Profile</h5>
            </div>
            <div class="card-block">
                <div class="usre-image">
                    <img src="{{ asset('main/assets/images/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
                </div>
                <h6 class="f-w-600 m-t-25 m-b-10">Alessa Robert</h6>
                <p class="text-muted">Active | Male | Born 23.05.1992</p>
                <hr/>
                <p class="text-muted m-t-15">Activity Level: 87%</p>
                <ul class="list-unstyled activity-leval">
                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                </ul>
                <div class="bg-c-blue counter-block m-t-10 p-20">
                    <div class="row">
                        <div class="col-4">
                            <i class="ti-comments"></i>
                            <p>1256</p>
                        </div>
                        <div class="col-4">
                            <i class="ti-user"></i>
                            <p>8562</p>
                        </div>
                        <div class="col-4">
                            <i class="ti-bag"></i>
                            <p>189</p>
                        </div>
                    </div>
                </div>
                <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <hr/>
                <div class="row justify-content-center user-social-link">
                    <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                    <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                    <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Activity Feed</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <ul class="feed-blog">
                    <li class="active-feed">
                        <div class="feed-user-img">
                            <img src="{{ asset('main/assets/images/avatar-3.jpg') }}" class="img-radius " alt="User-Profile-Image">
                        </div>
                        <h6><span class="label label-danger">File</span> Eddie uploaded new files: <small class="text-muted">2 hours ago</small></h6>
                        <p class="m-b-15 m-t-15">hii <b> @everone</b> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="row">
                            <div class="col-auto text-center">
                                <img src="{{ asset('main/assets/images/blog/blog-r-1.jpg') }}" alt="img" class="img-fluid img-100">
                                <h6 class="m-t-15 m-b-0">Old Scooter</h6>
                                <p class="text-muted m-b-0"><small>PNG-100KB</small></p>
                            </div>
                            <div class="col-auto text-center">
                                <img src="{{ asset('main/assets/images/blog/blog-r-2.jpg') }}" alt="img" class="img-fluid img-100">
                                <h6 class="m-t-15 m-b-0">Wall Art</h6>
                                <p class="text-muted m-b-0"><small>PNG-150KB</small></p>
                            </div>
                            <div class="col-auto text-center">
                                <img src="{{ asset('main/assets/images/blog/blog-r-3.jpg') }}" alt="img" class="img-fluid img-100">
                                <h6 class="m-t-15 m-b-0">Microphone</h6>
                                <p class="text-muted m-b-0"><small>PNG-150KB</small></p>
                            </div>
                        </div>
                    </li>
                    <li class="diactive-feed">
                        <div class="feed-user-img">
                            <img src="{{ asset('main/assets/images/avatar-4.jpg') }}" class="img-radius " alt="User-Profile-Image">
                        </div>
                        <h6><span class="label label-success">Task</span>Sarah marked the Pending Review: <span class="text-c-green"> Trash Can Icon Design</span><small class="text-muted">2 hours ago</small></h6>
                    </li>
                    <li class="diactive-feed">
                        <div class="feed-user-img">
                            <img src="{{ asset('main/assets/images/avatar-2.jpg') }}" class="img-radius " alt="User-Profile-Image">
                        </div>
                        <h6><span class="label label-primary">comment</span> abc posted a task:  <span class="text-c-green">Design a new Homepage</span>  <small class="text-muted">6 hours ago</small></h6>
                        <p class="m-b-15 m-t-15"hii <b> @everone</b> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </li>
                    <li class="active-feed">
                        <div class="feed-user-img">
                            <img src="{{ asset('main/assets/images/avatar-3.jpg') }}" class="img-radius " alt="User-Profile-Image">
                        </div>
                        <h6><span class="label label-warning">Task</span>Sarah marked : <span class="text-c-green"> do Icon Design</span><small class="text-muted">10 hours ago</small></h6>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
    <!-- users visite and profile end -->

</div>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('myChart').getContext('2d');

        const onlineOrdersCount = @json($total_pesanan_online);
        const offlineOrdersCount = @json($total_pesanan_offline);

        const labels = ['Online Orders', 'Offline Orders'];
        const data = [onlineOrdersCount, offlineOrdersCount];

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Orders',
                    data: data,
                    backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
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
