@extends('layouts.main.layout')
@section('title')
Pembayaran Reservasi
@endsection
<div class="container">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title">Pembayaran Nomor 1716118775-ORDER-02024051918392822</h5>
            </div>
            <div class="card-body">
                <!--[if BLOCK]><![endif]-->                    <div class="alert alert-success">
                        Pemesanan berhasil disimpan, silahkan lakukan pembayaran!
                    </div>
                <!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]-->                    <div class="text-right mb-4">
                        <a class="btn btn-info" href="https://dpodjok-garden.marthashares-project.my.id/print/invoice/5" target="_blank">Print Invoice</a>
                    </div>
                    <form wire:submit.prevent="pay">
                        <div class="form-group">
                            <label for="payment_method">Metode Pembayaran</label>
                            <select class="form-control" id="payment_method" wire:model.live="payment_method" required="">
                                <option value="cash" selected="">Tunai</option>
                                <option value="qris">QRIS</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="transaction_number">Nomor Transaksi</label>
                            <input type="text" class="form-control" id="transaction_number" wire:model.live="transaction_number" readonly="" required="">
                        </div>

                        <div class="form-group">
                            <label for="uang">Total Uang Diberikan</label>
                            <input type="number" min="10000" class="form-control" id="uang" wire:model.lazy="uang" required="">
                        </div>

                        <!-- Display total_bayar -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center">

                                    <span class="font-weight-bold">Total Harga:</span>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <div class="font-weight-bold">Rp. 10,000</div>
                            </div>
                        </div>
                        <!-- Display Kembali -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-money-bill-wave mr-2 text-success"></i>
                                    <span class="font-weight-bold">Kembali:</span>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <div class="font-weight-bold">Rp. 0</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </form>
                <!--[if ENDBLOCK]><![endif]-->
                <div class="text-right">
                    <a href="https://dpodjok-garden.marthashares-project.my.id/ordertrans" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>



</div>
<div class="card-body">
    <!--[if BLOCK]><![endif]-->                    <div class="alert alert-success">
            Pembayaran berhasil, Pesanan sudah masuk ke daftar antrian!
        </div>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]-->                    <div class="text-right mb-4">
            <a class="btn btn-success mr-2" href="https://dpodjok-garden.marthashares-project.my.id/print/receipt/5" target="_blank">Print Receipt</a>
            <a class="btn btn-info" href="https://dpodjok-garden.marthashares-project.my.id/print/invoice/5" target="_blank">Print Invoice</a>
        </div>
        <div>
            <p class="mb-2">Status Pembayaran: <span class="font-weight-bold">lunas</span></p>
            <p class="mb-2">Uang: Rp. 20,000</p>
            <p class="mb-2">Kembali: Rp. 10,000</p>
        </div>
    <!--[if ENDBLOCK]><![endif]-->
    <div class="text-right">
        <a href="https://dpodjok-garden.marthashares-project.my.id/ordertrans" class="btn btn-secondary">Kembali</a>
    </div>
</div>
