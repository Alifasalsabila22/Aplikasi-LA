@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Detail Barang Keluar</h2>
                <a class="btn btn-primary" href="{{ route('transaksis.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <strong>Transaksi Barang Keluar </strong>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>No Transaksi:</strong>
                        <p class="form-control-plaintext">{{ $transaksi->no_transaksi }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Tanggal keluar:</strong>
                        <p class="form-control-plaintext">{{ $transaksi->tanggal_keluar }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Lokasi Gudang:</strong>
                        <p class="form-control-plaintext">{{ $transaksi->rak->gudang->lokasi_gudang }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Judul Buku:</strong>
                        <p class="form-control-plaintext">{{ $transaksi->barang->judul }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Kelas:</strong>
                        <p class="form-control-plaintext">{{ $transaksi->barang->kategori->kelas }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Jenjang:</strong>
                        <p class="form-control-plaintext">{{ $transaksi->barang->kategori->jenjang }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Jumlah Keluar:</strong>
                        <p class="form-control-plaintext">{{ $transaksi->jumlah_keluar }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Total Stock:</strong>
                        <p class="form-control-plaintext">{{ $transaksi->total_stock }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Status:</strong>
                        <p class="form-control-plaintext">{{ $transaksi->status }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
