@extends('layouts.main.layout')
@section('title')
    Dashboard
@endsection
@section('styles')

@endsection
@section('content')
<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Hadir</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>{{ $totalHadir }}</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Sakit</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>{{ $totalSakit }}</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Libur</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>{{ $totalLibur }}</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Izin</h6>
                <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>{{ $totalIzin }}</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Cuti Kerja</h6>
                <h2 class="text-right"><i class="ti-tag f-left"></i><span>{{ $totalCuti }}</span></h2>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Jam Kerja Hari Ini</h5>
            </div>
            <div class="card-block">
                <span></span>
                <div class="card borderless-card">
                    <div class="card-block info-breadcrumb">
                        <div class="breadcrumb-header">
                            <h5>{{ now()->format('l, d F Y') }}</h5>
                        </div>
                        <div class="page-header-breadcrumb">
                            @if($worktime)
                                <ul class="breadcrumb-title m-t-10">
                                    <li class="breadcrumb-item"><a href="#!">Masuk - Selesai</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">{{ $worktime->start_time }} - {{ $worktime->end_time }}</a>
                                    </li>
                                    @if($worktime->rest_start_time && $worktime->rest_end_time)
                                        <li class="breadcrumb-item"><a href="#!">Istirahat: {{ $worktime->rest_start_time }} - {{ $worktime->rest_end_time }}</a>
                                        </li>
                                    @endif
                                </ul>
                            @else
                                <ul class="breadcrumb-title m-t-10">
                                    <li class="breadcrumb-item"><a href="#!">Tidak ada jadwal kerja hari ini</a></li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h5>Aktivitas Terbaru</h5>
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
                        <th>Metode</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tipe</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestActivities as $index => $activity)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $activity->source }}</td>
                            <td>{{ \Carbon\Carbon::parse($activity->date)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($activity->date)->format('H:i') }}</td>
                            <td>{{ ucfirst($activity->type) }}</td>
                            <td>{{ ucfirst($activity->status) }}</td>
                            <td>{{ $activity->keterangan }}</td>
                            <td>{{ $activity->catatan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
