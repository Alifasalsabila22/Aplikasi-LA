@extends('raks.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> jangan lupa isi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('raks.create') }}"> Create New Rak</a>
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
            <th>Nomor Rak</th>
            <th>Id rak</th>
            <th>Id Gudang</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($raks as $rak)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $rak->no_rak }}</td>
                <td>
                    {{ $rak->barang->kode_buku }}
                </td>
                <td>
                    {{ $rak->gudang->lokasi_gudang }}
                </td>
                <td>
                    <form action="{{ route('raks.destroy', $rak->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('raks.show', $rak->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('raks.edit', $rak->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $raks->links() !!}
@endsection
