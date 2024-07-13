@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New petugas</h2>
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

    <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input class="form-control" style="height:150px" name="nama" placeholder="nama" />
                    <strong>No Handphone:</strong>
                    <input class="form-control" style="height:150px" name="no_hp" placeholder="Nomor Handphone" />
                    <strong>Alamat:</strong>
                    <input class="form-control" style="height:150px" name="alamat" placeholder="alamat" />
                    <strong>Jenis Kelamin:</strong>
                    <input class="form-control" style="height:150px" name="jenis_kelamin" placeholder="jenis kelamin" />
                    <strong>Foto:</strong>
                    <input type="file" class="form-control" id="foto" name="foto" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btnprimary">Submit</button>
            </div>
        </div>

    </form>
@endsection
