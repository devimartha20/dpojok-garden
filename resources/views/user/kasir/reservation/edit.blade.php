@extends('layouts.main.layout')

@section('title')
    Edit Reservasi
@endsection
@section('styles')
<style>
    /* Additional CSS styles can be added here if needed */
    .product-image {
        float: left;
        margin-right: 100px;
    }
    .bottom-right {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .separator {
        margin-top: 20px;
        border-top: 1px solid #ccc;
    }
    .icon-link {
        margin-right: 10px;
    }
</style>
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Detail Reservasi</h5>
                </div>
                <div class="card-body">
                    <p>Tanggal Sewa : {{ $reservation->date }}</p>
                    <p>Jam Awal Sewa : {{ $reservation->start_time }}</p>
                    <p>Jam Akhir Sewa : {{ $reservation->end_time }}</p>
                    <p>Jumlah Tamu : {{ $reservation->guests }}</p>
                    <p>Catatan : {{ $reservation->note }} </p>
                    <div class="separator"></div>

                </div>
                <div class="card-footer">
                    {{-- <div class="bottom-left">
                        <a class="btn btn-secondary" href="{{ route('reservation.index') }}">
                            Kembali
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @livewire('update-reservation', [
                        'reservation' => $reservation,
                    ])
                </div>
                <div class="card-footer">

                    <a href="{{ route('reservation.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                    <a href="{{ route('reservation.cancel', $reservation->id) }}" class="btn btn-sm btn-danger">Batalkan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
