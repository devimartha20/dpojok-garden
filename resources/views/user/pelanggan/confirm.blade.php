@extends('layouts.customer.layout')

@section('title')
    Konfirmasi Pemesanan
@endsection

@section('styles')
<style>
    .product-details {
        display: flex;
        align-items: center;
    }

    .product-details .quantity {
        margin-right: 10px;
    }

    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        margin-right: 20px;
    }

    .total-price {
        font-weight: bold;
    }

    .accordion-msg {
        display: flex;
        align-items: center;
    }

    .card-footer {
        padding: 20px;
        background-color: #f7f7f7;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total-items {
        font-size: 16px;
    }

    .total-amount {
        font-size: 18px;
        font-weight: bold;
        color: green;
    }

    .btn-pay-now {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h5>Konfirmasi Pemesanan</h5>
    <form action="{{ route('confirm.confirm') }}" method="POST">
        @csrf
        <div class="card">
            @foreach ($detailOrders as $do)
            <div class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons scale_active" role="tab" id="ui-id-9" aria-controls="ui-id-10" aria-selected="false" aria-expanded="false" tabindex="-1">
                {{-- <div class="quantity">{{ $do['jumlah'] }} x</div> --}}
                <span class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>
            </div>
            <div class="card-block accordion-block">
                <div class="accordion-box ui-accordion ui-widget ui-helper-reset" id="single-open" role="tablist">
                    <div class="product-details">
                        <div class="col-md-2">
                            <img src="{{ asset('images/'.$do['product']->image) }}" alt="Product Image" class="product-image"> <br>
                            <small>{{ $do['product']->stok}} Tersedia</small>
                        </div>
                        <div class="col-md-4">
                            <h3>{{ $do['product']->nama }}</h3>
                            <p class="total-price">Harga : Rp. {{ number_format($do['harga']) }}</p>
                            <p class="total-price">Total : Rp. <span id="total-harga-{{ $do['product']->id }}">{{ number_format($do['total_harga']) }}</span></p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah[{{ $do['product']->id }}]">Jumlah : </label>
                                <input type="number" min=1 max="{{ $do['product']->stok }}" value="{{ $do['jumlah'] }}" class="form-control jumlah-input" data-product-id="{{ $do['product']->id }}" data-harga="{{ $do['harga'] }}" name="jumlah[{{ $do['product']->id }}]" required>
                            </div>
                            <div class="form-group">
                                <label for="catatan[{{ $do['product']->id }}]">Catatan : </label>
                                <input type="text" name="catatan[{{ $do['product']->id }}]" class="form-control" id="catatan[{{ $do['product']->id }}]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{ $do['detail_cart_id'] }}" name="dc[{{ $do['detail_cart_id'] }}]" required>
            <input type="hidden" value="{{ $do['harga'] }}" name="harga[{{ $do['product']->id }}]" required>
            <input type="hidden" value="{{ $do['total_harga'] }}" name="total_harga[{{ $do['product']->id }}]" required>
            <input type="hidden" value="{{ $do['product'] }}" name="product[{{ $do['product']->id }}]" required>
            @endforeach
        </div>
        <div class="card-footer">
            <a href="{{ route('cart.index') }}" class="btn btn-secondary">Kembali</a>
            <div class="total-items">Total Items: <span id="totalItems">{{ $total_items }}</span></div>
            <div class="total-amount">Total Amount: <span id="totalAmount">Rp. {{ number_format($total_amount) }}</span></div>

            <input type="hidden" value="{{ $total_amount }}" name="total_amount" required>
            <input type="hidden" value="{{ $total_items }}" name="total_items" required>
            <button type="submit" class="btn btn-primary">Konfirmasi Pesanan</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jumlahInputs = document.querySelectorAll('.jumlah-input');

        jumlahInputs.forEach(input => {
            input.addEventListener('input', function () {
                updateTotal();
            });
        });

        function updateTotal() {
            let totalHarga = 0;
            let totalItems = 0;

            jumlahInputs.forEach(input => {
                const harga = parseFloat(input.getAttribute('data-harga'));
                const jumlah = parseInt(input.value);

                totalHarga += harga * jumlah;
                totalItems += jumlah;

                const productId = input.getAttribute('data-product-id');
                const totalHargaElement = document.getElementById(`total-harga-${productId}`);
                if (totalHargaElement) {
                    totalHargaElement.textContent = (harga * jumlah).toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                }
            });

            document.getElementById('totalItems').textContent = totalItems;
            document.getElementById('totalAmount').textContent = totalHarga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
        }
    });
</script>
@endsection




