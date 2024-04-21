<div>
    <div class="card">
        <div class="card-header">
           <div class="card-title">
           <h5>Pembayaran Nomor {{ $payment->no_payment }}</h5>
            </div>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            @if($payment->status === 'belum_lunas')
            <div class="text-right mt-4">
                <a class="btn btn-info" href="{{ route('print.invoice', $payment->id) }}" target="_BLANK">Print Invoice</a>
            </div>
                <form wire:submit.prevent="pay">
                    <div class="form-group">
                        <label for="uang">Uang</label>
                        <input type="number" min="{{ $payment->total_bayar }}" class="form-control" id="uang" wire:model.live="uang" required>
                    </div>
                    <!-- Display total_bayar -->
                    <p>Total Bayar: Rp. {{ number_format($payment->total_bayar) }}</p>
                    <!-- Display Kembali -->
                    <p>Kembali: Rp. {{ number_format($kembali) }}</p>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>

            @elseif($payment->status === 'lunas')
            <div class="text-right mt-4">
                <a class="btn btn-success mr-2" href ="{{ route('print.receipt', $payment->id) }}" target="_BLANK">Print Receipt</a>
                <a class="btn btn-info" href="{{ route('invoice.route', $payment->id) }}" target="_BLANK">Print Invoice</a>
            </div>
                <div>
                    <p>Status Pembayaran: {{ $payment->status }}</p>
                    <p>Uang: Rp. {{ number_format($payment->uang) }}</p>
                    <p>Kembali: Rp. {{ number_format($payment->kembali) }}</p>
                    {{-- <p>Detail Pesanan:</p> --}}
                    <ul>
                        {{-- @foreach($payment->order->detailOrders as $detail)
                            <li>{{ $detail->product->nama }} - Jumlah: {{ $detail->jumlah }}</li>
                        @endforeach --}}
                    </ul>
                </div>

            @endif
            <div class="text-right">
                <a href="{{ route('ordertrans.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

</div>
