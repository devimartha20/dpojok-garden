@extends('layouts.main.layout')

@section('content')
<div class="card">
<div class="card-block front-icon-breadcrumb row align-items-end">
    <div class="breadcrumb-header col">
        <div class="big-icon">
            <i class="icofont icofont-user"></i>
        </div>
        <div class="d-inline-block">
            <h5>Sudah absen hari ini?</h5>
            <span>Lakukan absen dengan metode yang telah di sediakan</span>
        </div>
    </div>
    <div class="col">
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title m-t-15">
                <li class="breadcrumb-item"><a href="{{ route('employee.scan') }}">Scan QR</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('formabsen.route') }}">Form Absen</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('formtidakhadir.route') }}">Form Ketidakhadiran</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Riwayat Absensi</h5>
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
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        {{-- <th>ID Pegawai</th> --}}
                        <th>Metode</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tipe Absen</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendances as $atts)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        {{-- <td>3321</td> --}}
                        <td>
                            @if ($atts->method == 'qr')
                                Scan QR Code
                            @elseif($atts->method == 'confirmation')
                                Pengajuan Konfirmasi Kehadiran
                            @endif
                        </td>
                        <td>{{ $atts->date }}</td>
                        <td>{{ $atts->time }}</td>
                        <td>
                        @if ($atts->type == 'in')
                            Masuk
                        @elseif($atts->type == 'out')
                            Keluar
                        @endif
                        </td>
                        <td>
                            @if ($atts->status == 'confirmed')
                                <span class="label label-success">Dikonfirmasi</span>
                            @elseif ($atts->status == 'pending')
                                <span class="label label-warning">Menunggu</span>
                            @elseif($atts->status == 'rejected')
                            <span class="label label-danger">Ditolak</span>
                            @endif

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No Data</td>
                    </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
