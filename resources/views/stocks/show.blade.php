@extends('layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-cubes mr-2"></i> Show Stock</h2>
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
                    <h3 class="mb-0">Detail Stock</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="judul_Buku"><strong>Judul Buku:</strong></label>
                        <input type="text" class="form-control border-primary" id="judul_Buku" name="judul_Buku"
                            value="{{ $stock->barang->judul }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="kelas"><strong>Kelas:</strong></label>
                        <input type="text" class="form-control border-primary" id="kelas" name="kelas"
                            value="{{ $stock->kategori->kelas }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="kategori"><strong>Kategori:</strong></label>
                        <input type="text" class="form-control border-primary" id="kategori" name="kategori"
                            value="{{ $stock->kategori->jenjang }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="stock"><strong>Stock:</strong></label>
                        <input type="text" class="form-control border-primary" id="stock" name="stock"
                            value="{{ $stock->stock}}" disabled />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
