@extends('layouts.main.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Form Pengajuan Cuti</h4>
        <span>{{ now()->translatedFormat('l, d-m-Y') }}</span>
        <div class="card-header-right">
            <i class="icofont icofont-spinner-alt-5"></i>
        </div>
    </div>
    <div class="card-block">
        <form method="POST" action="{{ route('employee.leave.store') }}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Awal Cuti</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" name="start_date" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Akhir Cuti</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" name="end_date" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan Cuti</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="reason" placeholder="Alasan Cuti">
                </div>
            </div>
            {{-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Catatan">
                </div>
            </div> --}}
            <br>
            <br>
            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20 float-right" >Kirim
            </button>
            <a href="{{ route('employee.leave.index') }}" class="btn btn-primary waves-effect waves-light m-r-20 float-left" >Kembali
            </a>
        </form>
    </div>
</div>
@endsection
