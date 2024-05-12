@extends('layouts.main.layout')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-block text-center">
                <i class="fa fa-envelope-open text-c-blue d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-c-blue"></span>Kirim Pengajuan Cuti!</h4>
                {{-- <p class="m-b-20">Your main list is growing</p> --}}
                <a class="btn btn-primary btn-xl btn-round" href="{{ route('employee.leave.submit') }}">Buat Pengajuan</a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Daftar Pengajuan Cuti</h4>
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
    <div class="card-block p-0">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs" role="tablist">
            <li class="nav-item complete">
                <a class="nav-link active" data-toggle="tab" href="#all" role="tab" aria-expanded="true">Semua</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#confirmed" role="tab" aria-expanded="false">Dikonfirmasi</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pending" role="tab" aria-expanded="false">Menunggu</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#rejected" role="tab" aria-expanded="false">Ditolak</a>
                <div class="slide"></div>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content card-block">
            <div class="tab-pane active" id="all" role="tabpanel" aria-expanded="false">
                <!-- Content for Semua tab -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($leaves as $l)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $l->start_date }}</td>
                                <td>{{ $l->end_date }}</td>
                                <td>{{ $l->reason }}</td>
                                <td>
                                    @if($l->status == 'confirmed')
                                        <span class="label label-success"></span>
                                    @elseif($l->status == 'pending')
                                        <span class="label label-warning"></span>
                                    @elseif($l->status == 'rejected')
                                        <span class="label label-danger"></span>
                                    @endif
                                </td>
                                <td>{{ $l->catatan }}</td>
                               <td></td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                            <!-- Isi tabel Semua -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane" id="confirmed" role="tabpanel" aria-expanded="false">
                <!-- Content for Dikonfirmasi tab -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($confirmed_leaves as $cl)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cl->start_date }}</td>
                                <td>{{ $cl->end_date }}</td>
                                <td>{{ $cl->reason }}</td>
                                <td>
                                    @if($cl->status == 'confirmed')
                                        <span class="label label-success"></span>
                                    @elseif($cl->status == 'pending')
                                        <span class="label label-warning"></span>
                                    @elseif($cl->status == 'rejected')
                                        <span class="label label-danger"></span>
                                    @endif
                                </td>
                                <td>{{ $cl->catatan }}</td>
                               <td></td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                            <!-- Isi tabel Semua -->
                        </tbody>
                    </table>
                </div>
               
            </div>
            <div class="tab-pane" id="pending" role="tabpanel" aria-expanded="false">
                <!-- Content for Menunggu tab -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pending_leaves as $pl)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pl->start_date }}</td>
                                <td>{{ $pl->end_date }}</td>
                                <td>{{ $pl->reason }}</td>
                                <td>
                                    @if($pl->status == 'confirmed')
                                        <span class="label label-success"></span>
                                    @elseif($pl->status == 'pending')
                                        <span class="label label-warning"></span>
                                    @elseif($pl->status == 'rejected')
                                        <span class="label label-danger"></span>
                                    @endif
                                </td>
                                <td>{{ $pl->catatan }}</td>
                               <td></td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                            <!-- Isi tabel Semua -->
                        </tbody>
                    </table>
                </div>
               
            </div>
            <div class="tab-pane" id="rejected" role="tabpanel" aria-expanded="true">
                <!-- Content for Ditolak tab -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($leaves as $rl)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rl->start_date }}</td>
                                <td>{{ $rl->end_date }}</td>
                                <td>{{ $rl->reason }}</td>
                                <td>
                                    @if($rl->status == 'confirmed')
                                        <span class="label label-success"></span>
                                    @elseif($rl->status == 'pending')
                                        <span class="label label-warning"></span>
                                    @elseif($rl->status == 'rejected')
                                        <span class="label label-danger"></span>
                                    @endif
                                </td>
                                <td>{{ $rl->catatan }}</td>
                               <td></td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                            <!-- Isi tabel Semua -->
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
{{-- Modal  --}}
{{-- <div class="modal fade" id="data1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Cuti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>08-01-2024</td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td>12:30</td>
                        </tr>
                        <tr>
                            <td>Alasan</td>
                            <td>:</td>
                            <td>Cuti Melahirkan</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>Cuti selama 3 bulan</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>Dikonfirmasi</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
    </div>
</div> --}}
@endsection
