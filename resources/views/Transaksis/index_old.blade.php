@extends('transaksis.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Jangan Lupa Isi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('transaksis.create') }}">Create New Transaksi</a>
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
            <th>Gudang</th>
            <th>Kode Buku</th>
            <th>No Rak</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($transaksis as $key => $transaksi)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $transaksi->gudang->lokasi_gudang }}</td>
                <td>{{ $transaksi->barang->kode_buku }}</td>
                <td>{{ $transaksi->rak->no_rak }}</td>
                <td>{{ $transaksi->jumlah }}</td>
                <td>{{ $transaksi->status }}</td>
                <td>
                    <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('transaksis.show', $transaksi->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('transaksis.edit', $transaksi->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
