@extends('layouts.main.layout')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-block text-center">
                <i class="fa fa-envelope-open text-c-blue d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-c-blue"></span>Kirim Pengajuan Cuti!</h4>
                {{-- <p class="m-b-20">Your main list is growing</p> --}}
                <a class="btn btn-primary btn-xl btn-round" href="{{ route('formcuti.route') }}">Buat Pengajuan</a>
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
                <a class="nav-link" data-toggle="tab" href="#home3" role="tab" aria-expanded="false">Semua</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-expanded="false">Dikonfirmasi</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages3" role="tab" aria-expanded="false">Menunggu</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#settings3" role="tab" aria-expanded="true">Ditolak</a>
                <div class="slide"></div>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content card-block">
            <div class="tab-pane" id="home3" role="tabpanel" aria-expanded="false">
                <!-- Content for Semua tab -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Alasan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>01-09-2024</td>
                                <td>21:00</td>
                                <td>Cuti Melahirkan</td>
                                <td>Cuti selama 1 bulan</td>
                                <td><span class="label label-success">Dikonfirmasi</span></td>
                                <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>01-09-2024</td>
                                <td>21:00</td>
                                <td>Cuti Melahirkan</td>
                                <td>Cuti selama 1 bulan</td>
                                <td><span class="label label-danger">Ditolak</span></td>
                                <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                            </tr>
                            <!-- Isi tabel Semua -->
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                </div>
            </div>
            <div class="tab-pane" id="profile3" role="tabpanel" aria-expanded="false">
                <!-- Content for Dikonfirmasi tab -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Alasan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>01-09-2024</td>
                                <td>21:00</td>
                                <td>Cuti Melahirkan</td>
                                <td>Cuti selama 1 bulan</td>
                                <td><span class="label label-success">Dikonfirmasi</span></td>
                                <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>01-09-2024</td>
                                <td>21:00</td>
                                <td>Cuti Melahirkan</td>
                                <td>Cuti selama 1 bulan</td>
                                <td><span class="label label-success">Dikonfirmasi</span></td>
                                <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                            </tr>
                            <!-- Isi tabel Dikonfirmasi -->
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                </div>
            </div>
            <div class="tab-pane" id="messages3" role="tabpanel" aria-expanded="false">
                <!-- Content for Menunggu tab -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Alasan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>01-09-2024</td>
                                <td>21:00</td>
                                <td>Cuti Melahirkan</td>
                                <td>Cuti selama 1 bulan</td>
                                <td><span class="label label-warning">Menunggu</span></td>
                                <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>01-09-2024</td>
                                <td>21:00</td>
                                <td>Cuti Melahirkan</td>
                                <td>Cuti selama 1 bulan</td>
                                <td><span class="label label-warning">Menunggu</span></td>
                                <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                            </tr>
                            <!-- Isi tabel Menunggu -->
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                </div>
            </div>
            <div class="tab-pane active" id="settings3" role="tabpanel" aria-expanded="true">
                <!-- Content for Ditolak tab -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Alasan</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>01-09-2024</td>
                                <td>21:00</td>
                                <td>Cuti Melahirkan</td>
                                <td>Cuti selama 1 bulan</td>
                                <td><span class="label label-danger">Ditolak</span></td>
                                <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>01-09-2024</td>
                                <td>21:00</td>
                                <td>Cuti Melahirkan</td>
                                <td>Cuti selama 1 bulan</td>
                                <td><span class="label label-danger">Ditolak</span></td>
                                <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                            </tr>
                            <!-- Isi tabel Ditolak -->
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal  --}}
<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Alasan</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                            <td>1</td>
                            <td>01-09-2024</td>
                            <td>21:00</td>
                            <td>Cuti Melahirkan</td>
                            <td>Cuti selama 1 bulan</td>
                            <td><span class="label label-danger">Ditolak</span></td>
                            <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
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
@endsection
