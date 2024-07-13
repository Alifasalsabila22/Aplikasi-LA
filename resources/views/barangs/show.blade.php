@extends('layout')

@section('content')
    <div class="row mt-3 mb-4 align-items-center">
        <div class="col-lg-6">
            <h2 class="text-primary"><i class="fas fa-boxes mr-2"></i> Show Barang</h2>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-primary" href="{{ route('barangs.index') }}">
                <i class="fas fa-arrow-left mr-1"></i>
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Informasi Barang</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th style="width: 25%;">Kode Buku</th>
                                <td>{{ $barang->kode_buku }}</td>
                            </tr>
                            <tr>
                                <th>Judul</th>
                                <td>{{ $barang->judul }}</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>{{ $barang->kategori->kelas }}</td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td>{{ $barang->penerbit }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Terbit</th>
                                <td>{{ $barang->tahun_terbit }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $barang->kategori->jenjang }}</td>
                                <!-- Assuming you want to display the name instead of the ID -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
