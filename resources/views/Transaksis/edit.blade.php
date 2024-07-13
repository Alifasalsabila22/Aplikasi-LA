@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Transaksi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksis.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No Transaksi:</strong>
                    <input type="text" name="no_transaksi" value="{{ $transaksi->no_transaksi }}" class="form-control"
                        placeholder="Nomor Transaksi">
                </div>
                <div class="form-group">
                    <strong>Tanggal Masuk:</strong>
                    <input type="date" name="tanggal_masuk" value="{{ $transaksi->tanggal_masuk }}" class="form-control"
                        placeholder="Tanggal Masuk">
                </div>
                <div class="form-group">
                    <strong>Lokasi Gudang:</strong>
                    <select name="id_gudang" class="form-control">
                        <option value="">Select Lokasi Gudang</option>
                        @foreach ($gudangs as $gudang)
                            <option value="{{ $gudang->id }}"
                                {{ $transaksi->id_gudang == $gudang->id ? 'selected' : '' }}>
                                {{ $gudang->lokasi_gudang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Barang:</strong>
                    <select name="id_barang" class="form-control">
                        <option value="">Select Barang</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}"
                                {{ $transaksi->id_barang == $barang->id ? 'selected' : '' }}>
                                {{ $barang->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Kelas:</strong>
                    <select name="id_kategori" class="form-control">
                        <option value="">Select Kelas</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ $transaksi->id_kategori == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Kategori:</strong>
                    <select name="id_kategori" class="form-control">
                        <option value="">Select Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ $transaksi->id_kategori == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->jenjang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Jumlah Masuk:</strong>
                    <input type="number" name="jumlah_masuk" value="{{ $transaksi->jumlah_masuk }}" class="form-control"
                        placeholder="Jumlah Masuk">
                </div>

                <div class="form-group">
                    <strong>Total Stock:</strong>
                    <input type="number" name="total_stock" value="{{ $transaksi->total_stock }}" class="form-control"
                        placeholder="Total Stock">
                </div>
                <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" name="status" value="{{ $transaksi->status }}" class="form-control"
                        placeholder="Status">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
