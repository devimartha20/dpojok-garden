@extends('layouts.main.layout')

@section('title')
    Form Reservasi
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Form Reservasi</h4>
        <hr class="mt-0 mb-3">
    </div>
    <div class="card-block">
        <form>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pemesan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-bold" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nomor Meja</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-left" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Menu Yang Dipesan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-left" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Mulai Sewa</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control form-control-left" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Akhir Sewa</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control form-control-left" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Waktu Mulai Sewa</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control form-control-left" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Waktu Akhir Sewa</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control form-control-left" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Total Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-right" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
