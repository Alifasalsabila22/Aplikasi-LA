@extends('layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="font-weight-bold">Detail Rak</h2>
                    <a class="btn btn-primary" href="{{ route('raks.index') }}">Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h4 class="text-primary">Informasi Rak Buku</h4>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="no_rak" class="form-label"><strong>Nomor Rak:</strong></label>
                        <input type="text" disabled name="no_rak" value="{{ $rak->no_rak }}" class="form-control"
                            placeholder="Nomor Rak">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="no_rak" class="form-label"><strong>Lokasi Gudang:</strong></label>
                        <input type="text" disabled name="no_rak" value="{{ $rak->gudang->lokasi_gudang }}" class="form-control"
                            placeholder="Nomor Rak">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
