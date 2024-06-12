<div>
    <div class="col-lg-6 col-xl-12">
        <div class="title">Pemesanan</div>
        <ul class="nav nav-tabs md-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ $state == 'menunggu_pembayaran' ? 'active' : '' }}" data-toggle="tab" href="#menunggu_pembayaran" role="tab" aria-expanded="true">
                    <i class="ti-timer"></i>
                    Menunggu Pembayaran</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $state == 'menunggu' ? 'active' : '' }}" data-toggle="tab" href="#menunggu" role="tab" aria-expanded="false">
                    <i class="ti-timer"></i>
                    Menunggu</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $state == 'diproses' ? 'active' : '' }}" data-toggle="tab" href="#diproses" role="tab" aria-expanded="false">
                    <i class="ti-reload"></i>
                    Diproses</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $state == 'selesai' ? 'active' : '' }}" data-toggle="tab" href="#selesai" role="tab" aria-expanded="false">
                    <i class="ti-check-box"></i>
                    Selesai</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $state == 'diterima' ? 'active' : '' }}" data-toggle="tab" href="#diterima" role="tab" aria-expanded="false">
                    <i class="ti-check-box"></i>
                    Diterima</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $state == 'dibatalkan' ? 'active' : '' }}" data-toggle="tab" href="#dibatalkan" role="tab" aria-expanded="false">
                    <i class="ti-check-box"></i>
                    Dibatalkan</a>
                <div class="slide"></div>
            </li>
        </ul>
        <div class="tab-content card-block">
            <div class="tab-pane {{ $state == 'menunggu_pembayaran' ? 'active' : '' }}" id="menunggu_pembayaran" role="tabpanel" aria-expanded="true">
                <hr>
                @forelse ($orders_wp as $o)
                    <div class="card">
                        <div class="card-block caption-breadcrumb card-body">
                            <div class="breadcrumb-header">
                                <h6>No Pesanan: #{{ $o->no_pesanan }}</h6>
                                <p>Tanggal Pesanan: {{ $o->created_at }}</p>
                                <div class="product-details">
                                    <p>
                                        @foreach ($o->detailOrders as $do)
                                            {{ $do->nama }} {{ $do->jumlah }}x, <br>
                                        @endforeach
                                    </p>
                                </div>
                                <h6>Total: Rp. {{ number_format($o->total_harga) }}</h6>
                                <div><i><button class="btn btn-sm btn-secondary">Detail Pesanan</button></i></div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="text-center">Tidak Ada Pesanan Menunggu Pembayaran</div>
                @endforelse
            </div> 
            <div class="tab-pane {{ $state == 'menunggu' ? 'active' : '' }}" id="menunggu" role="tabpanel" aria-expanded="true">
                <hr>
                @forelse ($orders_w as $o)
                    <div class="card">
                        <div class="card-block caption-breadcrumb card-body">
                            <div class="breadcrumb-header">
                                <h6>No Pesanan: #{{ $o->no_pesanan }}</h6>
                                <p>Tanggal Pesanan: {{ $o->created_at }}</p>
                                <div class="product-details">
                                    <p>
                                        @foreach ($o->detailOrders as $do)
                                            {{ $do->nama}} {{ $do->jumlah }}x, <br>
                                        @endforeach
                                    </p>
                                </div>
                                <h6>Total: Rp. {{ number_format($o->total_harga) }}</h6>
                                <div><i><button class="btn btn-sm btn-secondary">Detail Pesanan</button></i></div>
                            </div>
                            <div class="card-footer">
                                @role('koki')
                                <div class="row">
                                    <div class="col float-start text-right">
                                        <button wire:click="updateStatus({{$o->id}}, 'diproses')" class="btn btn-sm btn-primary">Proses ></button>
                                    </div>
                                </div>
                                @endrole
                            </div>
                           
                        </div>
                    </div>
                @empty
                    <div class="text-center">Tidak Ada Pesanan Menunggu</div>
                @endforelse
            </div>
            <div class="tab-pane {{ $state == 'diproses' ? 'active' : '' }}" id="diproses" role="tabpanel" aria-expanded="false">
                <hr>
                @forelse ($orders_p as $o)
                    <div class="card">
                        <div class="card-block caption-breadcrumb card-body">
                            <div class="breadcrumb-header">
                                <h6>No Pesanan: #{{ $o->no_pesanan }}</h6>
                                <p>Tanggal Pesanan: {{ $o->created_at }}</p>
                                <div class="product-details">
                                    <p>
                                        @foreach ($o->detailOrders as $do)
                                            {{ $do->nama}} {{ $do->jumlah }}x, <br>
                                        @endforeach
                                    </p>
                                </div>
                                <h6>Total: Rp. {{ number_format($o->total_harga) }}</h6>
                                <span><i><button href="">Detail Pesanan</button></i></span>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                <div class="col float-start text-left">
                                    <button wire:click="updateStatus({{$o->id}}, 'menunggu')" class="btn btn-sm btn-primary">< Menunggu</button>
                                </div>
                                <div class="col float-start text-right">
                                    <button wire:click="updateStatus({{$o->id}}, 'selesai')" class="btn btn-sm btn-primary">Selesai ></button>
                                </div>
                                </div>    
                            </div>
                           
                        </div>
                    </div>
                @empty
                    <div class="text-center">Tidak Ada Pesanan Diproses</div>
                @endforelse
            </div>
            <div class="tab-pane {{ $state == 'selesai' ? 'active' : '' }}" id="selesai" role="tabpanel" aria-expanded="false">
                <hr>
                @forelse ($orders_f as $o)
                    <div class="card">
                        <div class="card-block caption-breadcrumb card-body">
                            <div class="breadcrumb-header">
                                <h6>No Pesanan: #{{ $o->no_pesanan }}</h6>
                                <p>Tanggal Pesanan: {{ $o->created_at }}</p>
                                <div class="product-details">
                                    <p>
                                        @foreach ($o->detailOrders as $do)
                                            {{ $do->nama}} {{ $do->jumlah }}x, <br>
                                        @endforeach
                                    </p>
                                </div>
                                <h6>Total: Rp. {{ number_format($o->total_harga) }}</h6>
                            </div>
                            <div class="col float-start text-right">
                                <span><i><a href="{{ route('order-history.show', $o->id) }}">Detail Pesanan</a></i></span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">Tidak Ada Pesanan yang Selesai</div>
                @endforelse
            </div>
            <div class="tab-pane {{ $state == 'diterima' ? 'active' : '' }}" id="diterima" role="tabpanel" aria-expanded="false">
                <hr>
                @forelse ($orders_s as $o)
                    <div class="card">
                        <div class="card-block caption-breadcrumb card-body">
                            <div class="breadcrumb-header">
                                <h6>No Pesanan: #{{ $o->no_pesanan }}</h6>
                                <p>Tanggal Pesanan: {{ $o->created_at }}</p>
                                <div class="product-details">
                                    <p>
                                        @foreach ($o->detailOrders as $do)
                                            {{ $do->nama}} {{ $do->jumlah }}x, <br>
                                        @endforeach
                                    </p>
                                </div>
                                <h6>Total: Rp. {{ number_format($o->total_harga) }}</h6>
                            </div>
                            <div class="col float-start text-right">
                                <span><i><a href="{{ route('order-history.show', $o->id) }}">Detail Pesanan</a></i></span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">Tidak Ada Pesanan yang Diterima</div>
                @endforelse
            </div>
            <div class="tab-pane {{ $state == 'dibatalkan' ? 'active' : '' }}" id="dibatalkan" role="tabpanel" aria-expanded="false">
                <hr>
                @forelse ($orders_d as $o)
                    <div class="card">
                        <div class="card-block caption-breadcrumb card-body">
                            <div class="breadcrumb-header">
                                <h6>No Pesanan: #{{ $o->no_pesanan }}</h6>
                                <p>Tanggal Pesanan: {{ $o->created_at }}</p>
                                <div class="product-details">
                                    <p>
                                        @foreach ($o->detailOrders as $do)
                                            {{ $do->nama}} {{ $do->jumlah }}x, <br>
                                        @endforeach
                                    </p>
                                </div>
                                <h6>Total: Rp. {{ number_format($o->total_harga) }}</h6>
                            </div>
                            <div class="col float-start text-right">
                                <span><i><a href="{{ route('order-history.show', $o->id) }}">Detail Pesanan</a></i></span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">Tidak Ada Pesanan yang Dibatalkan</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
