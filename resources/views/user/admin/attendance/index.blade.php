@extends('layouts.main.layout')
@section('title')
    Absensi Pegawai
@endsection
@section('styles')
 <!-- Notification.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection
@section('content')
<div><h6>Sesi Absensi Pegawai Hari Ini</h6></div><br>
<div class="card">
    <div class="card-header">
        <div class="card-header-right">
            <form id="toggleForm" action="{{ route('attendance.qr.status') }}" method="POST">
                @csrf
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" role="switch" {{ $qrActive->isActive == 1 ? 'checked' : '' }} id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Aktifkan Sesi Absensi QR</label>
                </div>
            </form>
        </div>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>ID Pegawai</th>
                        <th>Nama</th>
                        <th>Waktu</th>
                        <th>Kehadiran</th>
                        <th>Catatan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($groupedData as $idx1 => $date)
                        @foreach ($date as $idx2 => $d)
                            @if ($idx2 == 'attendances')
                                @foreach ($d as $at)
                                    @if ($at->type == 'in')
                                        <tr class="table-success">
                                            <th scope="row">{{ \Carbon\Carbon::parse($idx1)->format('l, F j, Y') }}</th>
                                            <td>{{ $at->employee->id_pegawai }}</td>
                                            <td>{{ $at->employee->nama }}</td>
                                            <td>{{ $at->time }}</td>
                                            <td>Masuk</td>
                                            <td>-</td>
                                            <td>
                                                @if ($at->status == 'confirmed')
                                                    <span class="label label-success">Dikonfirmasi</span>
                                                @elseif ($at->status == 'pending')
                                                    <span class="label label-warning">Menunggu</span>
                                                @elseif($at->status == 'rejected')
                                                    <span class="label label-danger">Ditolak</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @elseif($idx2 == 'absences')
                                @foreach ($d as $ab)
                                    @if($ab->reason == 'izin')
                                        <tr class="table-warning">
                                            <th scope="row">{{ $idx1 }}</th>
                                            <td>{{ $ab->employee->id_pegawai }}</td>
                                            <td>{{ $ab->employee->nama }}</td>
                                            <td>{{ $ab->time }}</td>
                                            <td>Izin</td>
                                            <td>{{ $ab->catatan }}</td>
                                            <td>
                                                @if ($ab->status == 'confirmed')
                                                    <span class="label label-success">Dikonfirmasi</span>
                                                @elseif ($ab->status == 'pending')
                                                    <span class="label label-warning">Menunggu</span>
                                                @elseif($ab->status == 'rejected')
                                                    <span class="label label-danger">Ditolak</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @elseif($ab->reason == 'sakit')
                                        <tr class="table-info">
                                            <th scope="row">{{ $idx1 }}</th>
                                            <td>{{ $ab->employee->id_pegawai }}</td>
                                            <td>{{ $ab->employee->nama }}</td>
                                            <td>{{ $ab->time }}</td>
                                            <td>Sakit</td>
                                            <td>{{ $ab->catatan }}</td>
                                            <td>
                                                @if ($ab->status == 'confirmed')
                                                    <span class="label label-success">Dikonfirmasi</span>
                                                @elseif ($ab->status == 'pending')
                                                    <span class="label label-warning">Menunggu</span>
                                                @elseif($ab->status == 'rejected')
                                                    <span class="label label-danger">Ditolak</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-12 col-xl-6">
    <div><h6>Daftar Pengajuan Form Absensi</h6></div>
    <ul class="nav nav-tabs md-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">Menunggu</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Disetujui</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings3" role="tab">Ditolak</a>
            <div class="slide"></div>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content card-block">
        <div class="tab-pane active" id="home3" role="tabpanel">
            <div class="page-header card">
                <div class="card-block">
                    <h6 class="m-b-10">0021 - Debi</h6><hr>
                    <p>Tipe : Absen Masuk</p>
                    <p>Catatan : absen masuk pagi ini</p>
                    <div class="float-right">
                        <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data1">Ubah Status</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="profile3" role="tabpanel">
            <div class="page-header card">
                <div class="card-block">
                    <h6 class="m-b-10">0021 - Deni</h6><hr>
                    <p>Tipe : Absen Masuk</p>
                    <p>Catatan : absen masuk pagi ini</p>
                    <div class="float-right">
                        <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data1">Ubah Status</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="messages3" role="tabpanel">
            <div class="page-header card">
                <div class="card-block">
                    <h6 class="m-b-10">0021 - Dedi</h6><hr>
                    <p>Tipe : Absen Masuk</p>
                    <p>Catatan : absen masuk pagi ini</p>
                    <div class="float-right">
                        <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data1">Ubah Status</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="settings3" role="tabpanel">
        </div>
    </div>
</div>
{{-- Modal  --}}
<div class="modal fade" id="data1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                    <label for="kode pegawai" class="form-label">Kode Pegawai</label>
                    <input type="text" class="form-control" id="kode pegawai" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama pegawai" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" id="tanggal" readonly>
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Tipe Absen</label>
                    <input type="text" class="form-control" id="waktu" readonly>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Catatan</label>
                    <input type="text" class="form-control" id="keterangan" readonly>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status">
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="catatan" class="form-label">Alasan</label>
                    <textarea class="form-control" id="catatan" rows="3"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleForm = document.getElementById('toggleForm');
        const toggleSwitch = document.getElementById('flexSwitchCheckDefault');

        toggleSwitch.addEventListener('change', function () {
            toggleForm.submit();
        });
    });
</script>
@endsection
