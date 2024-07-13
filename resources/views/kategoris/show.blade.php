@extends('layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2><i class="fas fa-th-list mr"></i> Show Kategori </h2>
            <a class="btn btn-primary" href="{{ route('kategoris.index') }}">
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
                    <h3 class="mb-0">Detail Kategori Buku</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Jenjang</strong>
                        <p class="form-control-static">{{ $kategori->jenjang }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Kelas:</strong>
                        <p class="form-control-static">{{ $kategori->kelas }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
