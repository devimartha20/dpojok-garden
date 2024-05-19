@extends('layouts.main.layout')

@section('title')
    Detail Reservasi
@endsection

@section('styles')
    <style>
        .container {
            margin-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .product-image {
            float: left;
            margin-right: 20px;
        }
        .bottom-right {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 20px;
        }
        .separator {
            margin: 20px 0;
            border-top: 1px solid #ccc;
        }
        .editable {
            cursor: pointer;
            color: blue;
        }
        .editable-input {
            display: none;
            width: auto;
            display: inline-block;
            margin-left: 10px;
        }
        .product-item {
            margin-bottom: 20px;
        }
        .product-item img {
            border: 1px solid #ccc;
            padding: 5px;
        }
        .accordion-desc h5, .accordion-desc p {
            margin: 5px 0;
        }
        .btn-primary, .btn-danger, .btn-success {
            margin: 5px 0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-text">Detail Reservasi</h4>
                </div>
                <div class="card-body">
                    <p>Tanggal Sewa: <span id="tanggal-sewa">01-01-2024</span></p>
                    <p>Jam Awal Sewa: <span id="jam-awal">10:00</span></p>
                    <p>Jam Akhir Sewa: <span id="jam-akhir">12:00</span></p>
                    <p>
                        Jumlah Tamu: <span id="jumlah-tamu" class="editable">4</span>
                        <input type="text" id="edit-jumlah-tamu" class="editable-input form-control" value="4">
                        <button onclick="updateGuestCount()" class="btn btn-sm btn-success editable-input">Update</button>
                    </p>
                    <p>Catatan: <span id="catatan">-</span></p>
                    <div class="separator"></div>
                    <p>Menu pesanan:</p>

                    <div id="products">
                        <div class="product-item">
                            <div class="product-image">
                                <img src="{{ asset('images/1711265258.png') }}" alt="Nama Produk" width="100">
                            </div>
                            <div class="accordion-desc">
                                <h5>Nasi Goreng Kecap Manis</h5>
                                <h5>Rp. 45.000</h5>
                                <p>Jumlah: <span class="editable">3</span></p>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <button onclick="addProduct()" class="btn btn-sm btn-primary">Tambah Produk</button>

                    <div class="separator"></div>
                    <p>Meja pesanan:</p>
                    <div id="tables">
                        <div class="product-item">
                            <div class="product-image">
                                <img src="{{ asset('images/1711265258.png') }}" alt="Nama Produk" width="100">
                            </div>
                            <div class="accordion-desc">
                                <h5>Meja no 5</h5>
                                <p>4 kursi</p>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </div>
                        </div>
                    </div>

                    <button onclick="addTable()" class="btn btn-sm btn-primary">Tambah Meja</button>

                    <div class="separator"></div>
                    <p>
                        Total harga: <span id="total-harga" class="editable">Rp. 135.000</span>
                        <input type="text" id="edit-total-harga" class="editable-input form-control" value="135.000">
                        <button onclick="updateTotalPrice()" class="btn btn-sm btn-success editable-input">Update</button>
                    </p>
                    <div class="bottom-right">
                        <button onclick="payReservation()" class="btn btn-primary">Bayar Reservasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateGuestCount() {
            const guestCount = document.getElementById('edit-jumlah-tamu').value;
            document.getElementById('jumlah-tamu').innerText = guestCount;
            toggleEdit('jumlah-tamu', 'edit-jumlah-tamu');
        }

        function updateTotalPrice() {
            const totalPrice = document.getElementById('edit-total-harga').value;
            document.getElementById('total-harga').innerText = `Rp. ${totalPrice}`;
            toggleEdit('total-harga', 'edit-total-harga');
        }

        function toggleEdit(spanId, inputId) {
            const span = document.getElementById(spanId);
            const input = document.getElementById(inputId);
            const isEditing = input.style.display === 'block';
            span.style.display = isEditing ? 'inline' : 'none';
            input.style.display = isEditing ? 'none' : 'inline-block';
        }

        document.getElementById('jumlah-tamu').addEventListener('click', () => {
            toggleEdit('jumlah-tamu', 'edit-jumlah-tamu');
        });

        document.getElementById('total-harga').addEventListener('click', () => {
            toggleEdit('total-harga', 'edit-total-harga');
        });

        function addProduct() {
            // Logic to add a new product
        }

        function addTable() {
            // Logic to add a new table
        }

        function payReservation() {
            // Logic to handle reservation payment
        }
    </script>
@endsection
