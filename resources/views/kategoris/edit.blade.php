@extends('layout')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2><i class="fas fa-th-list mr-2"></i> Kategori</h2>
            <a class="btn btn-primary" href="{{ route('kategoris.index') }}">
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
                    <h3 class="mb-0">Edit Kategori Buku</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="jenjang" class="form-label"><strong>Jenjang:</strong></label>
                            <input type="text" name="jenjang" value="{{ $kategori->jenjang }}" class="form-control"
                                placeholder="Jenjang" required>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label"><strong>Kelas:</strong></label>
                            <input type="text" class="form-control" name="kelas" placeholder="kelas">
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary"> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
