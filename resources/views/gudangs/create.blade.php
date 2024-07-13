@extends('layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Tambah Data Lokasi Gudang</h2>
                <a class="btn btn-primary" href="{{ route('gudangs.index') }}">
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

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('gudangs.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_perwakilan_regional" class="form-label">Kode Perwakilan Regional</label>
                            <input type="text" name="kode_perwakilan_regional" class="form-control"
                                placeholder="Kode Perwakilan Regional" required>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi_gudang" class="form-label">Lokasi Gudang</label>
                            <input type="text" name="lokasi_gudang" class="form-control" placeholder="Lokasi Gudang"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="no_gudang" class="form-label">Nomor Gudang</label>
                            <input type="text" name="no_gudang" class="form-control" placeholder="Nomor Gudang" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
