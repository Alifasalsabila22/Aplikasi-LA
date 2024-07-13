@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-cubes mr-2"></i> Add New Stock</h2>
            <a class="btn btn-primary" href="{{ route('stocks.index') }}">
                <i class="fas fa-arrow-left mr-0"></i> Back
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
            <div class="card shadow-sm rounded p-4">
                <form action="{{ route('stocks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_barang" class="form-label"><strong>Judul Buku:</strong></label>
                        <select class="form-control" name="id_barang" id="id_barang" required>
                            <option value="">Select Judul Buku</option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}">
                                    {{ $barang->judul . '(' . $barang->kategori?->jenjang . ' kelas : ' . $barang->kategori?->kelas . ')' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label"><strong>Stock:</strong></label>
                        <input type="number" name="stock" class="form-control" placeholder="Stock" required>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
