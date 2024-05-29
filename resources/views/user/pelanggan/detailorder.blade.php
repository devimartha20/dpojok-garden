@extends('layouts.customer.layout')

@section('title')
    Detail Order
@endsection

@section('styles')
    <style>
        /* Additional CSS styles */
        .product-image {
            float: left;
            margin-right: 20px;
        }
        .order-date {
            text-align: right;
            margin-bottom: 20px;
        }
        .action-links {
            text-align: right;
            margin-top: 10px;
        }
        .separator {
            margin: 20px 0;
            border-top: 1px solid #ccc;
        }
        .bottom-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .order-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
        }
        .waiting-payment { background-color: #ff0707; }
        .waiting { background-color: #ffc107; }
        .in-process { background-color: #17a2b8; }
        .finished { background-color: #288ea7; }
        .delivered { background-color: #28a745; }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Detail Order</h5>
                    </div>
                    <div class="card-body">

                        @if($order->progress == 'menunggu_pembayaran')
                            <div class="order-status waiting-payment">Menunggu Pembayaran</div>
                        @elseif($order->progress == 'menunggu')
                            <div class="order-status waiting">Menunggu</div>
                        @elseif($order->progress == 'diproses')
                            <div class="order-status in-process">Diproses</div>
                        @elseif($order->progress == 'selesai')
                            <div class="order-status finished">Selesai</div>
                        @elseif($order->progress == 'diterima')
                            <div class="order-status delivered">Diterima</div>
                        @endif
                        <div class="order-date">
                            Tanggal Pemesanan : {{ $order->created_at }}
                        </div>
                        <hr class="separator">
                        <div>
                            @foreach ($order->detailOrders as $do)
                            <div>
                                <div class="product-image">
                                    <img src="{{ asset('images/details/'.$do->image) }}" alt="Gambar Produk" width="150">
                                </div>
                                <div>
                                    <p><strong>Produk:</strong> {{ $do->nama }}</p>
                                    <p><strong>Jumlah:</strong> {{ $do->jumlah }}</p>
                                    <p><strong>Harga:</strong> Rp. {{ number_format($do->harga) }}</p>
                                    <p><strong>Catatan:</strong> {{ $do->catatan ?? '-' }}</p> <br>
                                    <p><strong>Total Harga:</strong> Rp. {{ number_format($do->total_harga) }}</p>
                                </div>
                            </div>

                            <hr class="separator">
                            @endforeach
                        </div>

                        <p><strong>Total Harga:</strong> Rp. {{ number_format($order->total_harga) }}</p>
                        @if($order->progress == 'menunggu_pembayaran')
                                <a href="{{ route('checkout', $order->id) }}" class="btn btn-primary">Bayar Sekarang</a>
                            @endif
                        <hr>
                        <div class="bottom-buttons">

                            <a href="{{ route('order-history.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
