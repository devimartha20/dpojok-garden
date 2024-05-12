@extends('layouts.main.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Form Absen</h4>
        <span>Senin, 24 Desember 2024</span>
        <div class="card-header-right">
            <i class="icofont icofont-spinner-alt-5"></i>
        </div>
    </div>
    <div class="card-block tooltip-icon button-list">
        <form method="POST" action="{{ route('employee.attendance.submit.store') }}">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="email"><i class="icofont icofont-check-alt"></i></span>
                    <select class="form-control" id="tipe_absen" name="type" required>
                        <option value="in">Masuk</option>
                        <option value="out">Keluar</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="email"><i class="icofont icofont-ui-note"></i></span>
                    <input type="datetime-local" readonly class="form-control" value="{{ now()->format('Y-m-d\TH:i') }}">
                </div>
            </div>
            
            
            <br>
            <br>
            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20 float-right" value="submit">Kirim
            </button>
            <a href="{{ route('employee.attendance') }}" class="btn btn-secondary waves-effect waves-light m-r-20 float-left" >Kembali
            </a>
        </form>
    </div>
</div>
@endsection
