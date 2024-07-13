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
                        <label><strong>No Transaksi :</strong></label>
                        <input type="text" class="form-control border-primary" id="transaksi" name="transaksi"
                            value="{{ $transaksi->no_transaksi }}" placeholder="Transaksi" disabled/>
                    </div>
                    <div class="mb-3">
                        <label><strong>Tanggal Keluar :</strong></label>
                        <input type="text" class="form-control border-primary" id="transaksi" name="transaksi"
                            value="{{ $transaksi->tanggal_keluar }}" placeholder="Transaksi" disabled/>
                    </div>
                    <div class="mb-3">
                        <label><strong>Lokasi Gudang :</strong></label>
                        <input type="text" class="form-control border-primary" id="transaksi" name="transaksi"
                            value="{{ $transaksi->rak->gudang->lokasi_gudang }}" placeholder="Transaksi" disabled/>
                    </div>
                    <div class="mb-3">
                        <label><strong>Judul Buku :</strong></label>
                        <input type="text" class="form-control border-primary" id="transaksi" name="transaksi"
                            value="{{ $transaksi->barang->judul }}" placeholder="Transaksi" disabled/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label><strong>Kelas :</strong></label>
                        <input type="text" class="form-control border-primary" id="transaksi" name="transaksi"
                            value="{{ $transaksi->barang->kategori->kelas }}" placeholder="Transaksi" disabled/>
                    </div>
                    <div class="mb-3">
                        <label><strong>Jenjang :</strong></label>
                        <input type="text" class="form-control border-primary" id="transaksi" name="transaksi"
                            value="{{ $transaksi->barang->kategori->jenjang }}" placeholder="Transaksi" disabled/>
                    </div>
                    <div class="mb-3">
                        <label><strong>Jumlah Keluar:</strong></label>
                        <input type="text" class="form-control border-primary" id="transaksi" name="transaksi"
                            value="{{ $transaksi->jumlah_keluar }}" placeholder="Transaksi" disabled/>
                    </div>
                    <div class="mb-3">
                        <label><strong>Total Stock :</strong></label>
                        <input type="text" class="form-control border-primary" id="transaksi" name="transaksi"
                            value="{{ $transaksi->total_stock }}" placeholder="Transaksi" disabled/>
                    </div>
                    <div class="mb-3">
                        <label><strong>Status :</strong></label>
                        <input type="text" class="form-control border-primary" id="transaksi" name="transaksi"
                            value="{{ $transaksi->status }}" placeholder="Transaksi" disabled/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
