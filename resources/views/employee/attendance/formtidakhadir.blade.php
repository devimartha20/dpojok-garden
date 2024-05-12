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
                    <input type="text" class="form-control" placeholder="Tanggal Awal" title="" data-toggle="tooltip" data-original-title="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="name"><i class="icofont icofont-calendar"></i></span>
                    <input type="text" class="form-control" placeholder="Tanggal Akhir" title="" data-toggle="tooltip" data-original-title="">
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
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Keterangan</th>
                        <th>Catatan</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>01-05-2024</td>
                        <td>13.00</td>
                        <td>Sakit</td>
                        <td>Selama 2 hari</td>
                        <td><span class="label label-success">Dikonfirmasi</span></td>
                        <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>01-05-2024</td>
                        <td>13.00</td>
                        <td>Izin</td>
                        <td>Anggota keluarga meninggal</td>
                        <td><span class="label label-warning">Menunggu</span></td>
                        <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                    </tr>
                    <tr>
                        <td scope="row">3</td>
                        <td>01-05-2024</td>
                        <td>13.00</td>
                        <td>Izin</td>
                        <td>Membuat kartu keluarga</td>
                        <td><span class="label label-danger">Ditolak</span></td>
                        <td><button type="button" class="btn btn-primary waves-effect waves-light m-r-20 float-center" data-toggle="tooltip" data-placement="center" title="" data-original-title="submit">Lihat Detail
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
