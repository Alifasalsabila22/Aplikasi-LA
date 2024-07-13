@extends('barangs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> jangan lupa isi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('barangs.create') }}"> Create New Barang</a>
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
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Kelas</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Kategori</th>
            <th>Stock</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($barangs as $barang)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $barang->kode_buku }}</td>
                <td>{{ $barang->judul }}</td>
                <td>{{ $barang->kelas }}</td>
                <td>{{ $barang->penerbit }}</td>
                <td>{{ $barang->tahun_terbit }}</td>
                <td>
                    {{ $barang->kategori->jenjang }}
                </td>
                <td>{{ $barang->stock }}</td>
                <td>
                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('barangs.show', $barang->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('barangs.edit', $barang->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $barangs->links() !!}
@endsection
