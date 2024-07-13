@extends('stocks.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> jangan lupa isi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('stocks.create') }}"> Create New stock</a>
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
            <th>Judul Buku</th>
            <th>Stock</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($stocks as $key => $stock)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $stock->barang->judul }}</td>
                <td>{{ $stock->stock }}</td>
                <td>
                    <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('stocks.show', $stock->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('stocks.edit', $stock->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $stocks->links() !!}
@endsection
