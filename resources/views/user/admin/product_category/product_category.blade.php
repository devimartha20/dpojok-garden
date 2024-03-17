@extends('layouts.main.layout')
@section('title')
    Kelola Kategori Produk
@endsection
@section('styles')

@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5>Daftar Kategori Produk</h5>
        <span>use class <code>table-hover</code> inside table element</span>
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
        <a href="{{route('product-category.create')  }}" class="btn btn-info btn-round">Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productCategory as $pc)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pc->nama }}</td>
                            <td>{{ $pc->deskripsi }}</td>
                            <td>
                                <button class="btn btn-danger btn-round btn-sm"><i class="ti-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Data</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
