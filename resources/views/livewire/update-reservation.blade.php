<div>
    <div class="mb-4">
        <input type="text" wire:model.live="search" placeholder="Search for products..." class="form-control" />
    </div>

    <div class="product-list mb-4">
        <h4>Menu</h4>
        @foreach ($products as $product)
            <div class="product-item mb-2">
                <div class="d-flex justify-content-between">
                    <span>{{ $product->nama }} - {{ $product->harga_jual }} (Stock: {{ $product->stok }})</span>
                    <button wire:click="addToOrder({{ $product->id }})" class="btn btn-primary btn-sm">Add to Order</button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="order-details mb-4">
        <h4>Detail Order</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Catatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productOrders as $index => $order)
                    <tr>
                        <td>{{ $order['nama'] }}</td>
                        <td>
                            <input type="number" wire:model.live="productOrders.{{ $index }}.jumlah" wire:change="updateDetailOrder({{ $index }})" class="form-control" />
                        </td>
                        <td>{{ $order['harga_jual'] }}</td>
                        <td>{{ $order['total_harga'] }}</td>
                        <td>
                            <input type="text" wire:model.live="productOrders.{{ $index }}.catatan" wire:change="updateDetailOrder({{ $index }})" class="form-control" />
                        </td>
                        <td>
                            <button wire:click="removeDetailOrder({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="total-price mb-4">
        <h4>Total Harga: {{ $total_price }}</h4>
    </div>

    <div class="payment-details mb-4">
        <h4>Data Pembayaran</h4>
        <p>Jumlah Terbayar: {{ $payment->uang }}</p>
        <p>Total Harga: {{ $payment->total_bayar }}</p>
        <p>Kembalian: {{ $payment->kembali }}</p>
        <p>Status: {{ $payment->status }}</p>
    </div>

    <div class="payment-form mb-4">
        <h4>Update Pembayaran</h4>
        <form wire:submit.prevent="updatePayment">
            <div class="form-group">
                <label for="uang">Jumlah Terbayar:</label>
                <input type="number" wire:model.live="uang" class="form-control" id="uang" min="0" required />
            </div>
            <button type="submit" class="btn btn-success">Update Pembayaran</button>
        </form>
    </div>

    <div class="payment-form mb-4">
        <h4>Tambah Jumlah Pembayaran</h4>
        <form wire:submit.prevent="addAmountToPayment">
            <div class="form-group">
                <label for="uang_new">Jumlah Ditambahkan:</label>
                <input type="number" wire:model.live="uang_new" class="form-control" id="uang_new" min="0" required />
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
    </div>
</div>
