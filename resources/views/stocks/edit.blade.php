@extends('layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-cubes mr-2"></i> Stock</h2>
            <a class="btn btn-primary" href="{{ route('stocks.index') }}">
                <i class="fas fa-arrow-left mr-0"></i>
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Edit Data Stock</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_barang"><strong>Select Judul Buku</strong></label>
                                    <select class="form-control border-primary" id="id_barang" name="id_barang">
                                        <option disabled selected>Judul Buku</option>
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id }}"
                                                {{ $barang->id == $stock->id_barang ? 'selected' : '' }}>
                                                {{ $barang->judul }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_kategori"><strong>Select Kelas</strong></label>
                                    <select class="form-control" name="id_kategori" required>
                                        <option disabled selected>Select Kelas</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->kelas }} /
                                                {{ $kategori->jenjang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="stock"><strong>Stock:</strong></label>
                                    <input type="number" class="form-control border-primary" id="stock" name="stock"
                                        value="{{ $stock->stock }}" placeholder="Stock" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .border-primary {
            border: 2px solid #007bff;
        }
    </style>
@endsection
