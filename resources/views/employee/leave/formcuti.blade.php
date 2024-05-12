@extends('layouts.main.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Form Pengajuan Cuti</h4>
        <span>Senin, 13-05-2024</span>
        <div class="card-header-right">
            <i class="icofont icofont-spinner-alt-5"></i>
        </div>
    </div>
    <div class="card-block">
        <form>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Mulai Cuti</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Tanggal Mulai Cuti">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Akhir Cuti</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Tanggal Akhir Cuti">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alasan Cuti</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Alasan Cuti">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Catatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Catatan">
                </div>
            </div>
            <br>
            <br>
            <button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-right" data-toggle="tooltip" data-placement="right" title="" data-original-title="submit">Kirim
            </button>
            <button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-left" data-toggle="tooltip" data-placement="Left" title="" data-original-title="submit">Kembali
            </button>
        </form>
    </div>
</div>
@endsection
