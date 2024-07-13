@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Add New Kategori</h2>
                <a class="btn btn-primary" href="{{ route('kategoris.index') }}">Back</a>
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
            <div class="card shadow-sm p-3">
                <form action="{{ route('kategoris.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="jenjang" class="form-label"><strong>Jenjang:</strong></label>
                        <select class="form-control" name="jenjang" required>
                            <option value="">Select Jenjang</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="SMA">SMK</option>
                            <option value="SMA">Buku Pendamping Guru</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label"><strong>Kelas:</strong></label>
                        <input type="text" class="form-control" name="kelas" placeholder="kelas">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
