@extends('layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2><i class="fas fa-map-marker-alt mr-2"></i>Lokasi Gudang</h2>
            <a class="btn btn-primary" href="{{ route('gudangs.index') }}">
                <i class="fas fa-arrow-left mr-1"></i>
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
                    <h3 class="mb-0">Data Lokasi Gudang</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Kode Perwakilan Regional:</strong>
                        <p class="form-control-static">{{ $gudang->kode_perwakilan_regional }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Lokasi Gudang:</strong>
                        <p class="form-control-static">{{ $gudang->lokasi_gudang }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Nomor Gudang:</strong>
                        <p class="form-control-static">{{ $gudang->no_gudang }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
