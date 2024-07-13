@extends('layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary"> Data Barang</h2>
                <a class="btn btn-primary" href="{{ route('barangs.index') }}">
                    <i class="fas fa-arrow-left mr-1"></i> Back
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

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="createModalLabel">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('barangs.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
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
                                    <select class="form-control" name="id_kategori" required>
                                        <option value="">Select Kelas</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->kelas }} /
                                                {{ $kategori->jenjang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="penerbit" class="form-label">Penerbit:</label>
                                    <input type="text" name="penerbit" class="form-control" placeholder="Penerbit"
                                        required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
                                    <input type="text" name="tahun_terbit" class="form-control"
                                        placeholder="Tahun Terbit" required>
                                </div>
                                {{-- <div class="form-group mb-4">
                                    <label for="id_kategori" class="form-label">Kategori:</label>
                                    <select class="form-control" name="id_kategori" required>
                                        <option value="">Select Kategori</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->jenjang }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                Open Create Modal
            </button>
        </div>
    </div>
@endsection
