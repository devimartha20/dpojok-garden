@extends('layouts.main.layout')
@section('title')
    Dashboard
@endsection
@section('styles')
@endsection
@section('content')
<div class="row">
    <!-- Order cards start -->
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Masuk</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>{{ $total_pesanan_masuk }}</span></h2>
                {{-- <p class="m-b-0">Pesanan Diterima<span class="f-right">351</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Diproses</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>{{ $total_pesanan_diproses }}</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">213</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Selesai</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>{{ $total_pesanan_selesai }}</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">213</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Diterima</h6>
                <h2 class="text-right"><i class="ti-reload f-left"></i><span>{{ $total_pesanan_diterima }}</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">Rp.1.200.000</span></p> --}}
            </div>
        </div>
    </div>
</div>
    <div class="col-md-12 col-lg-12">
        <div class="card tabs-card">
            <div class="card-block p-0">
                <div class="card-header">
                    <h5>Pesanan Masuk</h5>
                </div>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Jumlah Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pesanan_masuk_terbaru as $pmt)
                                    <tr>
                                        <td>{{ $pmt->product->nama  }}</td>
                                        <td>{{ $pmt->jumlah }}</td>
                                        <td>{{ $pmt->order->pemesanan ?? '' }}</td>
                                        <td>{{ $pmt->created_at }}</td>
                                        <td>Rp. {{ number_format($pmt->total_harga) }}</td>
                                        <td>
                                            @if ($pmt->order->progress == 'menunggu')
                                            <span class="label label-warning">{{ $pt->order->progress }}</span>
                                            @elseif($pmt->order->progress == 'diproses')
                                            <span class="label label-info">{{ $pt->order->progress }}</span>
                                            @elseif($pmt->order->progress == 'selesai')
                                            <span class="label label-success">{{ $pt->order->progress }}</span>
                                            @elseif($pmt->order->progress == 'diterima')
                                            <span class="label label-primary">{{ $pt->order->progress }}</span>
                                            @elseif($pmt->order->progress == 'dibatalkan')
                                            <span class="label label-secondary">{{ $pt->order->progress }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">No Data</td>
                                    </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card tabs-card">
            <div class="card-block p-0">
                <div class="card-header">
                    <h5>Semua Pesanan</h5>
                </div>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Jumlah Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pesanan_masuk as $pt)
                                    <tr>
                                        <td>{{ $pt->product->nama  }}</td>
                                        <td>{{ $pt->jumlah }}</td>
                                        <td>{{ $pt->order->pemesanan ?? '' }}</td>
                                        <td>{{ $pt->created_at }}</td>
                                        <td>Rp. {{ number_format($pt->total_harga) }}</td>
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
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">No Data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
