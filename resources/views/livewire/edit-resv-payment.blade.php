<div>
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Pembayaran Nomor {{ $payment->no_payment }}</h5>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="text-right mb-4">
                    <a class="btn btn-info" href="{{ route('print.invoice', $payment->id) }}" target="_blank">Print Invoice</a>

                </div>
                <form wire:submit.prevent="pay">

                    <div class="form-group">
                        <label for="payment_method">Metode Pembayaran</label>
                        <select class="form-control" id="payment_method" wire:model.live="payment_method" disabled>
                            <option value="cash" {{ $payment_method == 'cash' ? 'selected' : '' }}>Tunai</option>
                            <option value="qris" {{ $payment_method == 'qris' ? 'selected' : '' }}>QRIS</option>
                        </select>
                        <div class="alert alert-danger">
                            <small>Metode Pembayaran yang Tercatat adalah Metode Pembayaran Pertama Transaksi</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="transaction_number">Nomor Transaksi</label>
                        <input type="text" class="form-control" id="transaction_number" wire:model.live="transaction_number" readonly>
                    </div>

                    <div class="form-group">
                        <label for="uang">Total Uang Diberikan</label>
                        <input type="number" min=0 class="form-control" id="uang" wire:model.live="uang">
                    </div>

                    <div class="form-group">
                        <label for="uang">Tambahan Bayar</label>
                        <input type="number" min=0 class="form-control" id="uang" wire:model.live="uang_new">
                    </div>

                    <!-- Display total_bayar -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <span class="font-weight-bold">Total Harga:</span>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <div class="font-weight-bold">Rp. {{ number_format($payment->total_bayar) }}</div>
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
                            <div class="font-weight-bold">Rp. {{ number_format($kembali) }}</div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>
                <p class="mb-2">Status Pembayaran: <span class="font-weight-bold">{{ $payment->status }}</span></p>

            <div class="text-right">
                <a href="{{ route('ordertrans.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
