@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit petugas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('petugas.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your
            input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('petugas.update', $petugas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" value="{{ $petugas->nama }}" class="form-control"
                        placeholder="nama">
                    <strong>No Handphone:</strong>
                    <input type="text" name="no_handphone" value="{{ $petugas->no_handphone }}" class="form-control"
                        placeholder="no handphone">
                    <strong>Alamat:</strong>
                    <input type="text" name="alamat" value="{{ $petugas->alamat }}" class="form-control"
                        placeholder="Alamat">
                    <strong>Jenis Kelamin:</strong>
                    <input type="text" name="jenis_kelamin" value="{{ $petugas->jenis_kelamin }}" class="form-control"
                        placeholder="jenis_kelamin">
                    <strong>Foto:</strong>
                    <input type="text" name="foto" value="{{ $petugas->foto }}" class="form-control"
                        placeholder="foto">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    </form>
@endsection
