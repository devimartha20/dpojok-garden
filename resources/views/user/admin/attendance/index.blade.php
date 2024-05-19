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
<div><h6>Daftar Pengajuan Form Absensi</h6></div>
<div class="col-lg-12 col-xl-12">
    <ul class="nav nav-tabs md-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#pending" role="tab">Menunggu</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#confirmed" role="tab">Dikonfirmasi</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#rejected" role="tab">Ditolak</a>
            <div class="slide"></div>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content card-block">
        <div class="tab-pane active" id="pending" role="tabpanel">
            @forelse ($pending_attendances as $pa)
                <div class="page-header card">
                    <div class="card-block">
                        <h6 class="m-b-10">{{ $pa->employee->id_pegawai }} - {{ $pa->employee->nama }}</h6><hr>
                        <p>Tipe : {{ $pa->type == 'in' ? 'Absen Masuk' : 'Absen Keluar' }}</p>
                        <p>Tanggal : {{ $pa->date }}</p>
                        <div class="float-right">
                            <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data{{ $pa->id }}">Ubah Status</button>
                        </div>
                    </div>
                </div>

                {{-- Modal  --}}
                <div class="modal fade" id="data{{ $pa->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Absensi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('attendance.update.status', $pa->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode pegawai" class="form-label">Id Pegawai</label>
                                    <input type="text" value="{{ $pa->employee->id_pegawai }}" class="form-control" id="kode pegawai" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama pegawai" class="form-label">Nama Pegawai</label>
                                    <input type="text" value="{{ $pa->employee->nama }}" class="form-control"  readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu" class="form-label">Tipe Absen</label>
                                    <input type="text" value="{{ $pa->type == 'in' ? 'Absen Masuk' : 'Absen Keluar' }}" class="form-control" id="waktu" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="confirmed" {{ $pa->status == 'confirmed' ? 'selected' : '' }}>Diterima</option>
                                        <option value="rejected" {{ $pa->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                        <option value="pending" {{ $pa->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                    </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            @empty

            @endforelse

        </div>
        <div class="tab-pane" id="confirmed" role="tabpanel">
            @forelse ($confirmed_attendances as $ca)
                <div class="page-header card">
                    <div class="card-block">
                        <h6 class="m-b-10">{{ $ca->employee->id_pegawai }} - {{ $ca->employee->nama }}</h6><hr>
                        <p>Tipe : {{ $ca->type == 'in' ? 'Absen Masuk' : 'Absen Keluar' }}</p>
                        <p>Tanggal : {{ $ca->date }}</p>
                        <div class="float-right">
                            <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data{{ $ca->id }}">Ubah Status</button>
                        </div>
                    </div>
                </div>

                {{-- Modal  --}}
                <div class="modal fade" id="data{{ $ca->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Absensi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('attendance.update.status', $ca->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode pegawai" class="form-label">Id Pegawai</label>
                                    <input type="text" value="{{ $ca->employee->id_pegawai }}" class="form-control" id="kode pegawai" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama pegawai" class="form-label">Nama Pegawai</label>
                                    <input type="text" value="{{ $ca->employee->nama }}" class="form-control"  readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu" class="form-label">Tipe Absen</label>
                                    <input type="text" value="{{ $ca->type == 'in' ? 'Absen Masuk' : 'Absen Keluar' }}" class="form-control" id="waktu" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="confirmed" {{ $ca->status == 'confirmed' ? 'selected' : '' }}>Diterima</option>
                                        <option value="rejected" {{ $ca->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                        <option value="pending" {{ $ca->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                    </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
        <div class="tab-pane" id="rejected" role="tabpanel">
            @forelse ($rejected_attendances as $ra)
                <div class="page-header card">
                    <div class="card-block">
                        <h6 class="m-b-10">{{ $ra->employee->id_pegawai }} - {{ $ra->employee->nama }}</h6><hr>
                        <p>Tipe : {{ $ra->type == 'in' ? 'Absen Masuk' : 'Absen Keluar' }}</p>
                        <p>Tanggal : {{ $ra->date }}</p>
                        <div class="float-right">
                            <button class="btn btn-primary change-status" data-toggle="modal" data-target="#data{{ $ra->id }}">Ubah Status</button>
                        </div>
                    </div>
                </div>

                {{-- Modal  --}}
                <div class="modal fade" id="data{{ $ra->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Absensi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('attendance.update.status', $ra->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode pegawai" class="form-label">Id Pegawai</label>
                                    <input type="text" value="{{ $ra->employee->id_pegawai }}" class="form-control" id="kode pegawai" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama pegawai" class="form-label">Nama Pegawai</label>
                                    <input type="text" value="{{ $ra->employee->nama }}" class="form-control"  readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu" class="form-label">Tipe Absen</label>
                                    <input type="text" value="{{ $ra->type == 'in' ? 'Absen Masuk' : 'Absen Keluar' }}" class="form-control" id="waktu" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="confirmed" {{ $ra->status == 'confirmed' ? 'selected' : '' }}>Diterima</option>
                                        <option value="rejected" {{ $ra->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                        <option value="pending" {{ $ra->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
        <div class="tab-pane" id="settings3" role="tabpanel">
        </div>
    </div>
</div>
<br>
<div><h6>Sesi Absensi Pegawai Hari Ini</h6></div><br><br>
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
    <!-- <div class="card-block table-border-style">
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
                                            <th scope="row">{{ \Carbon\Carbon::parse($idx1)->format('l, F j, Y') }}</th>
                                            <td>{{ $ab->employee->id_pegawai }}</td>
                                            <td>{{ $ab->employee->nama }}</td>
                                            <td>{{ $ab->time ?? '-' }}</td>
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
                                            <th scope="row">{{ \Carbon\Carbon::parse($idx1)->format('l, F j, Y') }}</th>
                                            <td>{{ $ab->employee->id_pegawai }}</td>
                                            <td>{{ $ab->employee->nama }}</td>
                                            <td>{{ $ab->time ?? '-' }}</td>
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
    </div> -->
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
