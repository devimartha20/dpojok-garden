@extends('layouts.main.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Form Ketidakhadiran</h5>
        <div class="card-header-right">
            <i class="icofont icofont-spinner-alt-5"></i>
        </div>
    </div>
    <div class="card-block tooltip-icon button-list">
        <form method="POST" action="{{ route('employee.absence.submit.store') }}">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <label class="col-sm-2 col-form-label" for="start_date">Tanggal Awal</label>
                    <span class="input-group-addon"><i class="icofont icofont-calendar"></i></span>
                    <input type="datetime-local" class="form-control" name="start_date" id="start_date" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label class="col-sm-2 col-form-label" for="end_date">Tanggal Akhir</label>
                    <span class="input-group-addon"><i class="icofont icofont-calendar"></i></span>
                    <input type="datetime-local" class="form-control" name="end_date" id="end_date" required>
                    @error('end_date')
                        <span class="badge badge-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label class="col-sm-2 col-form-label" for="tipe_absen">Tipe Ketidakhadiran</label>
                    <span class="input-group-addon"><i class="icofont icofont-check-alt"></i></span>
                    <select class="form-control" id="tipe_absen" name="reason" required>
                        <option value="sakit">Sakit</option>
                        <option value="izin">Izin</option>
                        <option value="Libur">Libur</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                    <span class="input-group-addon"><i class="icofont icofont-check-alt"></i></span>
                    <input class="form-control" type="text" name="keterangan" id="keterangan" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20 float-right">Simpan</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Daftar Pengajuan Ketidakhadiran</h5>
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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Awal</th>
                        <th>Tanggal Akhir</th>
                        <th>Tipe</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absences as $ab)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ab->start_date }}</td>
                            <td>{{ $ab->end_date }}</td>
                            <td>{{ $ab->reason }}</td>
                            <td>{{ $ab->keterangan }}</td>
                            <td>
                                @if($ab->status == 'confirmed')
                                    <span class="label label-success">Dikonfirmasi</span>
                                @elseif($ab->status == 'pending')
                                    <span class="label label-warning">Menunggu</span>
                                @elseif($ab->status == 'rejected')
                                    <span class="label label-danger">Ditolak</span>
                                @endif
                            </td>
                            <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-target="#data{{ $ab->id }}" data-toggle="modal">Lihat Detail</button></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan=7 class="text-center">No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($absences as $ab)
    {{-- Modal  --}}
    <div class="modal fade" id="data{{ $ab->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Ketidakhadiran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Tanggal Awal</td>
                                    <td>:</td>
                                    <td>{{ $ab->start_date }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Akhir</td>
                                    <td>:</td>
                                    <td>{{ $ab->end_date }}</td>
                                </tr>
                                <tr>
                                    <td>Tipe</td>
                                    <td>:</td>
                                    <td>{{ $ab->reason }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangam</td>
                                    <td>:</td>
                                    <td>{{ $ab->keterangan }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        @if($ab->status == 'confirmed')
                                            <span class="label label-success">Dikonfirmasi</span>
                                        @elseif($ab->status == 'pending')
                                            <span class="label label-warning">Menunggu</span>
                                        @elseif($ab->status == 'rejected')
                                            <span class="label label-danger">Ditolak</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td>:</td>
                                    <td>{{ $ab->catatan ?? '-' }}</td>
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
    </div>
@endforeach

@endsection
