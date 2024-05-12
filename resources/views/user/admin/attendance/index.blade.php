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
<div class="card">
    <div class="card-header">
        <h5>Absensi Pegawai</h5>
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
