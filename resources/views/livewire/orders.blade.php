<div>
    <div class="col-lg-6 col-xl-12">
        <!-- <h6 class="sub-title">Tab With Icon</h6> -->
        <div class="sub-title">Pemesanan</div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ $state == 'menunggu' ? 'active' : '' }}" data-toggle="tab" href="#menunggu" role="tab" aria-expanded="true">
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
        </ul>
        <!-- Tab panes -->
        <div class="tab-content card-block">
            <div class="tab-pane {{ $state == 'menunggu' ? 'active' : '' }}" id="menunggu" role="tabpanel" aria-expanded="true">
                <hr>
                @forelse ($orders_w as $o)
                <div class="card borderless-card">
                    <div class="card-block danger-breadcrumb">
                        <div class="row">
                            <div class="col">
                                <div class="breadcrumb-header">
                                    <h5>No Pesanan : {{ $o->no_pesanan }}</h5>
                                    <span>Pemesan :
                                    @if ($o->tipe == 'in_store')
                                        {{ $o->pemesan }}
                                    @elseif($o->tipe == 'online')
                                        {{ $o->user->name }}
                                    @endif</span>
                                    <p>@if ($o->packing == 'dine_in')
                                        Makan di Tempat
                                        @elseif($o->packing == 'take_away')
                                        Dibungkus
                                    @endif</p>
                                </div>

                                <div class="page-header-breadcrumb">
                                    <button type="button" class="btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#detail{{ $o->id }}">
                                        Lihat Detail Pemesanan
                                    </button>
                                    <ul class="breadcrumb-title m-t-10">
                                        <li class="breadcrumb-item"><a href="#!">{{ $o->updated_at }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col float-end text-right">
                                <span><i>{{ $o->updated_at->diffForHumans() }}</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-danger text-right">
                        @role(['koki'])
                        <button class="btn btn-warning" wire:click="updateStatus('{{ $o->id }}', 'diproses')">Proses ></button>
                        @endrole
                    </div>
                </div>

                {{-- Modal Detail --}}
                <div class="modal fade" id="detail{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Detail Order {{ $o->no_pesanan }}
                            @if ($o->detailOrders->count() > 0)
                                @if ($o->packing == 'dine_in')
                                    <p class="text-uppercase">Makan di Tempat</p>
                                @elseif($o->packing == 'take_away')
                                <p class="text-uppercase">Dibungkus</p>
                                @endif
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Menu</th>
                                            <th>Jumlah</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($o->detailOrders as $do)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $do->product->nama }}</td>
                                            <td>{{ $do->jumlah }}</td>
                                            <td>{{ $do->catatan ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            @endif


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
            <div class="tab-pane {{ $state == 'diproses' ? 'active' : '' }}" id="diproses" role="tabpanel" aria-expanded="false">
                <hr>
                @forelse ($orders_p as $o)
                <div class="card borderless-card">
                    <div class="card-block warning-breadcrumb">
                        <div class="row">
                            <div class="col">
                                <div class="breadcrumb-header">
                                    <h5>No Pesanan : {{ $o->no_pesanan }}</h5>
                                    <span>Pemesan :
                                    @if ($o->tipe == 'in_store')
                                        {{ $o->pemesan }}
                                    @elseif($o->tipe == 'online')
                                        {{ $o->user->name }}
                                    @endif</span>
                                    <p>@if ($o->packing == 'dine_in')
                                        Makan di Tempat
                                        @elseif($o->packing == 'take_away')
                                        Dibungkus
                                    @endif</p>
                                </div>
                                <div class="page-header-breadcrumb">
                                    <button type="button" class="btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#detail{{ $o->id }}">
                                        Lihat Detail Pemesanan
                                    </button>
                                    <ul class="breadcrumb-title m-t-10">
                                        <li class="breadcrumb-item"><a href="#!">{{ $o->updated_at }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col float-end text-right">

                                <span><i>{{ $o->updated_at->diffForHumans() }}</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-warning d-flex justify-content-between">
                        @role(['koki'])
                        <div>
                            <button class="btn btn-danger" wire:click="updateStatus('{{ $o->id }}', 'menunggu')">< Menunggu</button>
                        </div>
                        <div>
                            <button class="btn btn-info" wire:click="updateStatus('{{ $o->id }}', 'selesai')">Selesai ></button>
                        </div>
                        @endrole
                    </div>
                </div>
                {{-- Modal Detail --}}
                <div class="modal fade" id="detail{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Detail Order {{ $o->no_pesanan }}
                            @if ($o->detailOrders->count() > 0)
                                @if ($o->packing == 'dine_in')
                                    <p class="text-uppercase">Makan di Tempat</p>
                                @elseif($o->packing == 'take_away')
                                <p class="text-uppercase">Dibungkus</p>
                                @endif
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Menu</th>
                                            <th>Jumlah</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($o->detailOrders as $do)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $do->product->nama }}</td>
                                            <td>{{ $do->jumlah }}</td>
                                            <td>{{ $do->catatan ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            @endif


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
            <div class="tab-pane {{ $state == 'selesai' ? 'active' : '' }}" id="selesai" role="tabpanel" aria-expanded="false">
                <hr>
                @forelse ($orders_f as $o)
                <div class="card borderless-card">
                    <div class="card-block info-breadcrumb">
                        <div class="row">
                            <div class="col">
                                <div class="breadcrumb-header">
                                    <h5>No Pesanan : {{ $o->no_pesanan }}</h5>
                                    <span>Pemesan :
                                    @if ($o->tipe == 'in_store')
                                        {{ $o->pemesan }}
                                    @elseif($o->tipe == 'online')
                                        {{ $o->user->name }}
                                    @endif</span>
                                    <p>@if ($o->packing == 'dine_in')
                                        Makan di Tempat
                                        @elseif($o->packing == 'take_away')
                                        Dibungkus
                                    @endif</p>
                                </div>
                                <div class="page-header-breadcrumb">
                                    <button type="button" class="btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#detail{{ $o->id }}">
                                        Lihat Detail Pemesanan
                                    </button>
                                    <ul class="breadcrumb-title m-t-10">
                                        <li class="breadcrumb-item"><a href="#!">{{ $o->updated_at }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col float-end text-right">
                                <span><i>{{ $o->updated_at->diffForHumans() }}</i></span>
                            </div>
                        </div>
                    </div>

                        @role('koki')
                        <div class="card-footer bg-info text-left">
                            <button class="btn btn-warning" wire:click="updateStatus('{{ $o->id }}', 'diproses')">< Proses</button>
                        </div>
                        @endrole
                        @role('pelayan')
                        <div class="card-footer bg-info text-right">
                            <button class="btn btn-success" wire:click="updateStatus('{{ $o->id }}', 'diterima')">Diterima ></button>
                        </div>
                        @endrole

                </div>
                {{-- Modal Detail --}}
                <div class="modal fade" id="detail{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Detail Order {{ $o->no_pesanan }}
                            @if ($o->detailOrders->count() > 0)
                                @if ($o->packing == 'dine_in')
                                    <p class="text-uppercase">Makan di Tempat</p>
                                @elseif($o->packing == 'take_away')
                                <p class="text-uppercase">Dibungkus</p>
                                @endif
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Menu</th>
                                            <th>Jumlah</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($o->detailOrders as $do)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $do->product->nama }}</td>
                                            <td>{{ $do->jumlah }}</td>
                                            <td>{{ $do->catatan ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            @endif


                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                        </div>
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
                <div class="card borderless-card">
                    <div class="card-block success-breadcrumb">
                        <div class="row">
                            <div class="col">
                                <div class="breadcrumb-header">
                                    <h5>No Pesanan : {{ $o->no_pesanan }}</h5>
                                    <span>Pemesan :
                                    @if ($o->tipe == 'in_store')
                                        {{ $o->pemesan }}
                                    @elseif($o->tipe == 'online')
                                        {{ $o->user->name }}
                                    @endif</span>
                                    <p>@if ($o->packing == 'dine_in')
                                        Makan di Tempat
                                        @elseif($o->packing == 'take_away')
                                        Dibungkus
                                    @endif</p>
                                </div>
                                <div class="page-header-breadcrumb">
                                    <button type="button" class="btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#detail{{ $o->id }}">
                                        Lihat Detail Pemesanan
                                    </button>
                                    <ul class="breadcrumb-title m-t-10">
                                        <li class="breadcrumb-item"><a href="#!">{{ $o->updated_at }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col float-end text-right">
                                <span><i>{{ $o->updated_at->diffForHumans() }}</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-success text-left">
                        @role('pelayan')
                        <button class="btn btn-info" wire:click="updateStatus('{{ $o->id }}', 'selesai')">< Selesai</button>
                        @endrole
                    </div>
                </div>
                {{-- Modal Detail --}}
                <div class="modal fade" id="detail{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Detail Order {{ $o->no_pesanan }}
                            @if ($o->detailOrders->count() > 0)
                                @if ($o->packing == 'dine_in')
                                    <p class="text-uppercase">Makan di Tempat</p>
                                @elseif($o->packing == 'take_away')
                                <p class="text-uppercase">Dibungkus</p>
                                @endif
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Menu</th>
                                            <th>Jumlah</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($o->detailOrders as $do)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $do->product->nama }}</td>
                                            <td>{{ $do->jumlah }}</td>
                                            <td>{{ $do->catatan ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            @endif


                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                        </div>
                    </div>
                    </div>
                </div>
                @empty
                <div class="text-center">Tidak Ada Pesanan yang Diterima</d>
                @endforelse

            </div>
        </div>
    </div>

</div>
