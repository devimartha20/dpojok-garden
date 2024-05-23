@extends('layouts.main.layout')
@section('title')
    Dashboard
@endsection
@section('styles')
@endsection
@section('content')
<div class="row">
    <!-- order-card start -->
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Masuk</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>50</span></h2>
                {{-- <p class="m-b-0">Pesanan Diterima<span class="f-right">351</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Diproses</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>11</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">213</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Selesai</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>11</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">213</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-md-5 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Pesanan Diterima</h6>
                <h2 class="text-right"><i class="ti-reload f-left"></i><span>20</span></h2>
                {{-- <p class="m-b-0">Bulan Ini<span class="f-right">Rp.1.200.000</span></p> --}}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Bar chart</h5>
                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                <div class="card-header-right">                                                             <i class="icofont icofont-spinner-alt-5"></i>                                                         </div>
            </div>
            <div class="card-block">
                <div id="morris-bar-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="382.944" version="1.1" width="755.083" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; top: -0.239624px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="32.95876693725586" y="350.4856669845581" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.00000023269655" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#eef0f2" d="M45.45876693725586,350.4856669845581H730.083" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.95876693725586" y="269.1142502384186" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="3.9999824123382837" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan></text><path fill="none" stroke="#eef0f2" d="M45.45876693725586,269.1142502384186H730.083" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.95876693725586" y="187.74283349227906" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000010368347176" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan></text><path fill="none" stroke="#eef0f2" d="M45.45876693725586,187.74283349227906H730.083" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.95876693725586" y="106.37141674613952" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000000177383413" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan></text><path fill="none" stroke="#eef0f2" d="M45.45876693725586,106.37141674613952H730.083" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.95876693725586" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000000476837158" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan></text><path fill="none" stroke="#eef0f2" d="M45.45876693725586,25H730.083" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="681.1812690669468" y="362.9856669845581" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="4.00000023269655" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><text x="583.3778072008405" y="362.9856669845581" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="4.00000023269655" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan></text><text x="485.5743453347342" y="362.9856669845581" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="4.00000023269655" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan></text><text x="387.7708834686279" y="362.9856669845581" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="4.00000023269655" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2009</tspan></text><text x="289.96742160252165" y="362.9856669845581" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="4.00000023269655" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2008</tspan></text><text x="192.1639597364153" y="362.9856669845581" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="4.00000023269655" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2007</tspan></text><text x="94.36049787030902" y="362.9856669845581" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.6667)"><tspan dy="4.00000023269655" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2006</tspan></text><rect x="57.68419967051915" y="25" width="22.450865466526576" height="325.4856669845581" rx="0" ry="0" fill="#5fbeaa" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="83.13506513704573" y="57.54856669845577" width="22.450865466526576" height="292.93710028610235" rx="0" ry="0" fill="#5d9cec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="108.58593060357231" y="155.19426679382323" width="22.450865466526576" height="195.2914001907349" rx="0" ry="0" fill="#cccccc" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="155.48766153662547" y="106.37141674613952" width="22.450865466526576" height="244.1142502384186" rx="0" ry="0" fill="#5fbeaa" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="180.93852700315205" y="138.91998344459532" width="22.450865466526576" height="211.5656835399628" rx="0" ry="0" fill="#5d9cec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="206.38939246967863" y="220.29140019073486" width="22.450865466526576" height="130.19426679382326" rx="0" ry="0" fill="#cccccc" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="253.29112340273176" y="187.74283349227906" width="22.450865466526576" height="162.74283349227906" rx="0" ry="0" fill="#5fbeaa" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="278.7419888692583" y="220.29140019073486" width="22.450865466526576" height="130.19426679382326" rx="0" ry="0" fill="#5d9cec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="304.1928543357849" y="252.8399668891907" width="22.450865466526576" height="97.64570009536743" rx="0" ry="0" fill="#cccccc" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="351.09458526883805" y="106.37141674613952" width="22.450865466526576" height="244.1142502384186" rx="0" ry="0" fill="#5fbeaa" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="376.5454507353646" y="138.91998344459532" width="22.450865466526576" height="211.5656835399628" rx="0" ry="0" fill="#5d9cec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="401.9963162018912" y="220.29140019073486" width="22.450865466526576" height="130.19426679382326" rx="0" ry="0" fill="#cccccc" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="448.89804713494436" y="187.74283349227906" width="22.450865466526576" height="162.74283349227906" rx="0" ry="0" fill="#5fbeaa" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="474.34891260147094" y="220.29140019073486" width="22.450865466526576" height="130.19426679382326" rx="0" ry="0" fill="#5d9cec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="499.7997780679975" y="252.8399668891907" width="22.450865466526576" height="97.64570009536743" rx="0" ry="0" fill="#cccccc" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="546.7015090010507" y="106.37141674613952" width="22.450865466526576" height="244.1142502384186" rx="0" ry="0" fill="#5fbeaa" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="572.1523744675773" y="138.91998344459532" width="22.450865466526576" height="211.5656835399628" rx="0" ry="0" fill="#5d9cec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="597.6032399341038" y="220.29140019073486" width="22.450865466526576" height="130.19426679382326" rx="0" ry="0" fill="#cccccc" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="644.504970867157" y="25" width="22.450865466526576" height="325.4856669845581" rx="0" ry="0" fill="#5fbeaa" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="669.9558363336836" y="57.54856669845577" width="22.450865466526576" height="292.93710028610235" rx="0" ry="0" fill="#5d9cec" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="695.4067018002102" y="220.29140019073486" width="22.450865466526576" height="130.19426679382326" rx="0" ry="0" fill="#cccccc" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="left: 631.181px; top: 131px; display: none;"><div class="morris-hover-row-label">2012</div><div class="morris-hover-point" style="color: #5FBEAA">
A:
100
</div><div class="morris-hover-point" style="color: #5D9CEC">
B:
90
</div><div class="morris-hover-point" style="color: #cCcCcC">
C:
40
</div></div></div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6">
        <div class="card tabs-card">
            <div class="card-block p-0">
                <div class="card-header">
                    <h5>Semua Pesanan</h5>
                </div>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Jumlah Harga</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/prod3.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>Spagetti</td>
                                    <td>2</td>
                                    <td>Dodi</td>
                                    <td>06-05-2024</td>
                                    <td>Rp. 30.000</td>
                                    <td><span class="label label-primary">Selesai</span></td>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/squash-lemon.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>Cireng</td>
                                    <td>1</td>
                                    <td>Asep</td>
                                    <td>05-05-2024</td>
                                    <td>Rp. 10.000</td>
                                    <td><span class="label label-success">Diterima</span></td>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/prod3.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>Spagetti</td>
                                    <td>2</td>
                                    <td>Dodi</td>
                                    <td>06-05-2024</td>
                                    <td>Rp. 30.000</td>
                                    <td><span class="label label-warning">Diproses</span></td>
                                </tr>
                                <tr>
                                    {{-- <td><img src="{{ asset('main/assets/images/product/prod3.jpg') }}" alt="prod img" class="img-fluid"></td> --}}
                                    <td>Spagetti</td>
                                    <td>2</td>
                                    <td>Dodi</td>
                                    <td>06-05-2024</td>
                                    <td>Rp. 30.000</td>
                                    <td><span class="label label-danger">Menunggu</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
