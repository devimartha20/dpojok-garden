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
        <form>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="name"><i class="icofont icofont-calendar"></i></span>
                    <input type="text" class="form-control" placeholder="Tanggal" title="" data-toggle="tooltip" data-original-title="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="email"><i class="icofont icofont-check-alt"></i></span>
                    <select class="form-control" id="tipe_absen" name="tipe_absen">
                        <option value="masuk">Sakit</option>
                        <option value="keluar">Izin</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="email"><i class="icofont icofont-ui-note"></i></span>
                    <input type="text" class="form-control" placeholder="Catatan" title="" data-toggle="tooltip" data-original-title="">
                </div>
            </div>
            <button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-right" data-toggle="tooltip" data-placement="right" title="" data-original-title="submit">Submit
            </button>
        </form>
    </div>
</div>
@endsection
