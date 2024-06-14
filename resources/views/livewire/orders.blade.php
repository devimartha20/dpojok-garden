<div>
    <div class="container">
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="title">Pemesanan</div>
            <ul class="nav nav-tabs md-tabs justify-content-center horizontal-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ $state == 'menunggu_pembayaran' ? 'active' : '' }}" data-toggle="tab" href="#menunggu_pembayaran" role="tab" aria-expanded="false">
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
                                <div><i><button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#detail{{ $o->id }}">Detail Pesanan</button></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL -->
                    <div class="modal fade" id="detail{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>  
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col">
                                        <h6 class="mb-0">No Pesanan: #{{ $o->no_pesanan }}</h6>
                                        <p class="mb-0">Tanggal Pesanan: {{ $o->created_at }}</p>
                                    </div>
                                    <div class="col">
                                        <strong>{{ $o->packing }}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Ordered Items</h5>
                                                @foreach ($o->detailOrders as $do)
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <strong>Product:</strong> {{ $do->nama }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>Quantity:</strong> {{ $do->jumlah }}
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
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
                                <div><i><button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#detail{{ $o->id }}">Detail Pesanan</button></i></div>
                            </div>
                            <div class="card-footer">
                                @role('koki')
                                <div class="row">
                                    <div class="col text-right">
                                        <button wire:click="updateStatus({{$o->id}}, 'diproses')" class="btn btn-sm btn-primary">Proses ></button>
                                    </div>
                                </div>
                                @endrole
                            </div>
                        </div>
                    </div>
                  <!-- MODAL -->
                  <div class="modal fade" id="detail{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>  
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col">
                                        <h6 class="mb-0">No Pesanan: #{{ $o->no_pesanan }}</h6>
                                        <p class="mb-0">Tanggal Pesanan: {{ $o->created_at }}</p>
                                    </div>
                                    <div class="col">
                                        <strong>{{ $o->packing }}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Ordered Items</h5>
                                                @foreach ($o->detailOrders as $do)
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <strong>Product:</strong> {{ $do->nama }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>Quantity:</strong> {{ $do->jumlah }}
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center">Tidak Ada Pesanan Menunggu</div>
                    @endforelse
                </div>
                <div class="tab-pane {{ $state == 'diproses' ? 'active' : '' }}" id="diproses" role="tabpanel" aria-expanded="true">
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
                                 <div><i><button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#detail{{ $o->id }}">Detail Pesanan</button></i></div>
                            </div>
                            <div class="card-footer">
                                @role('koki')
                                <div class="row">
                                    <div class="col text-left">
                                        <button wire:click="updateStatus({{$o->id}}, 'menunggu')" class="btn btn-sm btn-primary">< Menunggu</button>
                                    </div>
                                    <div class="col text-right">
                                        <button wire:click="updateStatus({{$o->id}}, 'selesai')" class="btn btn-sm btn-primary">Selesai ></button>
                                    </div>
                                </div>
                                @endrole
                            </div>
                        </div>
                    </div>
                     <!-- MODAL -->
                     <div class="modal fade" id="detail{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>  
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col">
                                        <h6 class="mb-0">No Pesanan: #{{ $o->no_pesanan }}</h6>
                                        <p class="mb-0">Tanggal Pesanan: {{ $o->created_at }}</p>
                                    </div>
                                    <div class="col">
                                        <strong>{{ $o->packing }}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Ordered Items</h5>
                                                @foreach ($o->detailOrders as $do)
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <strong>Product:</strong> {{ $do->nama }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>Quantity:</strong> {{ $do->jumlah }}
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center">Tidak Ada Pesanan Diproses</div>
                    @endforelse
                </div>
                <div class="tab-pane {{ $state == 'selesai' ? 'active' : '' }}" id="selesai" role="tabpanel" aria-expanded="true">
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
                                 <div><i><button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#detail{{ $o->id }}">Detail Pesanan</button></i></div>
                            </div>
                            <div class="card-footer">
                                
                                <div class="row">
                                    @role('koki')
                                        <div class="col text-left">
                                            <button wire:click="updateStatus({{$o->id}}, 'diproses')" class="btn btn-sm btn-primary">< Diproses</button>
                                        </div>
                                    @endrole
                                    @role('pelayan')
                                        <div class="col text-right">
                                            <button wire:click="updateStatus({{$o->id}}, 'diterima')" class="btn btn-sm btn-primary">Diterima ></button>
                                        </div>
                                    @endrole
                                </div>
                               
                            </div>
                        </div>
                    </div>
                     <!-- MODAL -->
                     <div class="modal fade" id="detail{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>  
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col">
                                        <h6 class="mb-0">No Pesanan: #{{ $o->no_pesanan }}</h6>
                                        <p class="mb-0">Tanggal Pesanan: {{ $o->created_at }}</p>
                                    </div>
                                    <div class="col">
                                        <strong>{{ $o->packing }}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Ordered Items</h5>
                                                @foreach ($o->detailOrders as $do)
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <strong>Product:</strong> {{ $do->nama }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>Quantity:</strong> {{ $do->jumlah }}
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center">Tidak Ada Pesanan Selesai</div>
                    @endforelse
                </div>
                <div class="tab-pane {{ $state == 'diterima' ? 'active' : '' }}" id="diterima" role="tabpanel" aria-expanded="true">
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
                                 <div><i><button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#detail{{ $o->id }}">Detail Pesanan</button></i></div>
                            </div>
                            <div class="card-footer">
                                
                                <div class="row">
                                    @role('pelayan')
                                        <div class="col text-left">
                                            <button wire:click="updateStatus({{$o->id}}, 'selesai')" class="btn btn-sm btn-primary">< Selesai</button>
                                        </div>
                                    @endrole
                                </div>
                               
                            </div>
                        </div>
                    </div>
                     <!-- MODAL -->
                     <div class="modal fade" id="detail{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>  
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col">
                                        <h6 class="mb-0">No Pesanan: #{{ $o->no_pesanan }}</h6>
                                        <p class="mb-0">Tanggal Pesanan: {{ $o->created_at }}</p>
                                    </div>
                                    <div class="col">
                                        <strong>{{ $o->packing }}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Ordered Items</h5>
                                                @foreach ($o->detailOrders as $do)
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <strong>Product:</strong> {{ $do->nama }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>Quantity:</strong> {{ $do->jumlah }}
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center">Tidak Ada Pesanan Diterima</div>
                    @endforelse
                </div>
                <div class="tab-pane {{ $state == 'dibatalkan' ? 'active' : '' }}" id="dibatalkan" role="tabpanel" aria-expanded="true">
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
                                 <div><i><button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#detail{{ $o->id }}">Detail Pesanan</button></i></div>
                            </div>
                        </div>
                    </div>
                     <!-- MODAL -->
                     <div class="modal fade" id="detail{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>  
                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col">
                                        <h6 class="mb-0">No Pesanan: #{{ $o->no_pesanan }}</h6>
                                        <p class="mb-0">Tanggal Pesanan: {{ $o->created_at }}</p>
                                    </div>
                                    <div class="col">
                                        <strong>{{ $o->packing }}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Ordered Items</h5>
                                                @foreach ($o->detailOrders as $do)
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <strong>Product:</strong> {{ $do->nama }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>Quantity:</strong> {{ $do->jumlah }}
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center">Tidak Ada Pesanan Dibatalkan</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    </div>
    
</div>
