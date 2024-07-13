@extends('layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2><i class="fas fa-edit mr"></i>Lokasi Gudang</h2>
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
                    <h3 class="mb-0">Edit Lokasi Gudang</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('gudangs.update', $gudang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_perwakilan_regional"><strong>Kode Perwakilan Regional:</strong></label>
                                    <input type="text" name="kode_perwakilan_regional"
                                        value="{{ $gudang->kode_perwakilan_regional }}" class="form-control"
                                        placeholder="Kode Perwakilan Regional">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi_gudang"><strong>Lokasi Gudang:</strong></label>
                                    <input type="text" name="lokasi_gudang" value="{{ $gudang->lokasi_gudang }}"
                                        class="form-control" placeholder="Lokasi Gudang">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_gudang"><strong>Nomor Gudang:</strong></label>
                                    <input type="text" name="no_gudang" value="{{ $gudang->no_gudang }}"
                                        class="form-control" placeholder="Nomor Gudang">
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
