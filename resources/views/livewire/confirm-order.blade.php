<div>
    <div class="container">
        <h3 class="title">Konfirmasi Pemesanan</h3>
        <form action="{{ route('confirm.confirm') }}" method="POST">
            @csrf
            <div class="card">
                @foreach ($detailOrders as $index => $do)
                    <div class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons scale_active" role="tab" id="ui-id-{{ $loop->index + 1 }}" aria-controls="ui-id-{{ $loop->index + 2 }}" aria-selected="false" aria-expanded="false" tabindex="-1">
                        <div class="quantity">{{ $do['jumlah'] }} x</div>
                        <span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>
                    </div>
                    <div class="card-block accordion-block">
                        <div class="accordion-box ui-accordion ui-widget ui-helper-reset" id="single-open" role="tablist">
                            <div class="product-details">
                                <div class="col-md-2">
                                    <img src="{{ asset('images/'.$do['image']) }}" alt="Product Image" class="product-image">
                                </div>
                                <div class="col-md-4">
                                    <h3>{{ $do['nama'] }}</h3>
                                    <p class="total-price">Harga : Rp. {{ number_format($do['harga']) }}</p>
                                    <p class="total-price">Total : Rp. {{ number_format($do['total_harga']) }}</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah[{{ $do['product']->id }}]">Jumlah : </label>
                                        <input type="number" min="1"
                                            wire:model.live="detailOrders.{{ $index }}.jumlah"
                                            name="jumlah[{{ $do['product']->id }}]"
                                            class="form-control" id="jumlah[{{ $do['product']->id }}]" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan[{{ $do['product']->id }}]">Catatan : </label>
                                        <input type="text" name="catatan[{{ $do['product']->id }}]"
                                               class="form-control" id="catatan[{{ $do['product']->id }}]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $do['harga'] }}" name="harga[{{ $do['product']->id }}]" required>
                    <input type="hidden" value="{{ $do['total_harga'] }}" name="total_harga[{{ $do['product']->id }}]" required>
                    <input type="hidden" value="{{ $do['product']->id }}" name="product_ids[]" required>
                @endforeach
            </div>
            <div class="card-footer">
                <div class="total-items">Total Items: {{ $total_items }}</div>
                <div class="total-amount">Total Amount: Rp. {{ number_format($total_amount) }}</div>
                <button type="submit" class="btn btn-primary btn-pay-now">Konfirmasi Pesanan</button>
            </div>
        </form>
    </div>
</div>
