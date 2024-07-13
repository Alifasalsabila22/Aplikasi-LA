@extends('layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Add New Rak</h2>
                <a class="btn btn-primary" href="{{ route('raks.index') }}">
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
                    <form action="{{ route('raks.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="no_rak" class="form-label">No Rak:</label>
                            <input type="text" name="no_rak" class="form-control" placeholder="Nomor Rak" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="id_barang" class="form-label">Select Judul Buku:</label>
                            <select class="form-control" name="id_barang" id="id_barang">
                                <option value="">Select Judul Buku</option>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id }}">
                                        {{ $barang->judul . '(' . $barang->kategori?->jenjang . ' kelas : ' . $barang->kategori?->kelas . ')' }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label for="id_gudang" class="form-label">Select Gudang:</label>
                            <select class="form-control" name="id_gudang" required>
                                <option value="">Select Gudang</option>
                                @foreach ($gudangs as $gudang)
                                    <option value="{{ $gudang->id }}">{{ $gudang->lokasi_gudang }}</option>
                                @endforeach
                            </select>
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
