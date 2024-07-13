@extends('layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary"> Data Barang</h2>
                <a class="btn btn-primary" href="{{ route('barangs.index') }}">
                    <i class="fas fa-arrow-left mr-1"></i>
                </a>
            </div>
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

    <div class="row mt-1">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Tambah Data Barang</h3>
                </div>
                <form action="{{ route('barangs.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="kode_buku" class="form-label">Kode Buku:</label>
                                <input type="text" name="kode_buku" class="form-control" placeholder="Kode Buku"
                                    required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="judul" class="form-label">Judul:</label>
                                <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="kelas" class="form-label">Kelas:</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Kelas" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="penerbit" class="form-label">Penerbit:</label>
                                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
                                <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit"
                                    required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="id_kategori" class="form-label">Kategori:</label>
                                <select class="form-control" name="id_kategori" required>
                                    <option value="">Select Kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->jenjang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
