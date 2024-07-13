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
                        <strong>Judul Buku:</strong>
                        <p class="form-control-static">{{ $stock->barang->judul }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Kelas:</strong>
                        <p class="form-control-static">{{ $stock->kategori->kelas }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Kategori:</strong>
                        <p class="form-control-static">{{ $stock->kategori->jenjang }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Stock:</strong>
                        <p class="form-control-static">{{ $stock->stock }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
