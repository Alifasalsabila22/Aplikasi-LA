@extends('petugas.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>petugas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('petugas.create') }}"> Create New petugas</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No Handphone</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Foto</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($petugas as $petugas)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $petugas->nama }}</td>
                <td>{{ $petugas->no_hp }}</td>
                <td>{{ $petugas->alamat }}</td>
                <td>{{ $petugas->jenis_kelamin }}</td>
                <td>{{ $petugas->foto }}</td>

                <td>
                    <form action="{{ route('petugas.destroy', $petugas->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('petugas.show', $petugas->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('petugas.edit', $petugas->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btndanger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
