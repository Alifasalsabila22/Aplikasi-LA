@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Petugas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('petugas.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $petugas->nama }}
                <strong>no handphone:</strong>
                {{ $petugas->no_hp }}
                <strong>Alamat:</strong>
                {{ $petugas->alamat }}
                <strong>Jenis Kelamin:</strong>
                {{ $petugas->jenis_kelamin }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            </div>
        </div>
    </div>
@endsection
