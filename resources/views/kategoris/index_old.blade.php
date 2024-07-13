@extends('kategoris.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Kategori</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('kategoris.create') }}"> Create New kategoris</a>
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
            <th>Jenjang</th>
            <th>Kelas</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($kategoris as $kategori)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $kategori->jenjang }}</td>
                <td>{{ $kategori->kelas }}</td>
                <td>
                    <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('kategoris.show', $kategori->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('kategoris.edit', $kategori->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btndanger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $kategoris->links() !!}
@endsection