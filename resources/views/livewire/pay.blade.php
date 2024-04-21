<div>
    <div class="card">
        <div class="card-header">Pembayaran Nomor {{ $payment->no_payment }}</div>
        <div class="card-body">
            @if($payment->status === 'belum lunas')
                <form wire:submit.prevent="pay">
                    <div class="form-group">
                        <label for="uang">Uang</label>
                        <input type="number" class="form-control" id="uang" wire:model.defer="uang" required>
                    </div>
                    <!-- Display total_bayar -->
                    <p>Total Bayar: Rp. {{ number_format($payment->total_bayar) }}</p>
                    <!-- Display Kembali -->
                    <p>Kembali: Rp. {{ number_format($kembali) }}</p>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" wire:click="printInvoice">Print Invoice</button>
                </div>
            @elseif($payment->status === 'lunas')
                <div>
                    <p>Status Pembayaran: {{ $payment->status }}</p>
                    <p>Uang: Rp. {{ number_format($payment->uang) }}</p>
                    <p>Kembali: Rp. {{ number_format($payment->kembali) }}</p>
                    <p>Detail Pesanan:</p>
                    <ul>
                        @foreach($payment->order->details as $detail)
                            <li>{{ $detail->product->nama }} - Jumlah: {{ $detail->jumlah }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary mr-2" wire:click="printReceipt">Print Receipt</button>
                    <button class="btn btn-primary" wire:click="printInvoice">Print Invoice</button>
                </div>
            @endif
        </div>
    </div>

</div>
