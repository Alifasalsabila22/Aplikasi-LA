@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary"><i class="fas fa-box-open mr-2"></i> Add Barang Keluar</h2>
                <a class="btn btn-primary" href="{{ route('transaksis.index') }}">
                    <i class="fas fa-arrow-left mr-1"></i> Back
                </a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('transaksis.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="no_transaksi"><strong>No Transaksi:</strong></label>
                                    <input type="text" name="no_transaksi" class="form-control"
                                        placeholder="Nomor Transaksi">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="tanggal_keluar"><strong>Tanggal Keluar:</strong></label>
                                    <input type="date" name="tanggal_keluar" class="form-control"
                                        placeholder="Tanggal Keluar">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="id_gudang"><strong>Lokasi Gudang:</strong></label>
                                    <input type="text" id="lokasi_gudang" class="form-control" readonly>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="status"><strong>Status:</strong></label>
                                    <input type="text" id="status" name="status" value="out" class="form-control"
                                    placeholder="out" readonly>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="id_rak"><strong>Lokasi Rak:</strong></label>
                                    <select class="form-control" id="id_rak" name="id_rak">
                                        <option value="">Select Lokasi Rak</option>
                                        @foreach ($raks as $rak)
                                            <option value="{{ $rak->id }}">{{ $rak->no_rak }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="id_barang"><strong>Judul Buku:</strong></label>
                                    <select class="form-control" name="id_barang" id="id_barang">
                                        <option value="">Select Judul Buku</option>
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id }}">
                                                {{ $barang->judul . ' (' . $barang->kategori?->jenjang . ' kelas: ' . $barang->kategori?->kelas . ')' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="jumlah_keluar"><strong>Jumlah Keluar:</strong></label>
                                    <input type="number" name="jumlah_keluar" class="form-control"
                                        placeholder="Jumlah Keluar">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="total_stock"><strong>Total Stock:</strong></label>
                                    <input type="number" id="total_stock" name="total_stock" class="form-control"
                                        placeholder="Total Stock" readonly>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#id_barang').change(function() {
                var selectedOption = $('#id_barang').val();
                $.ajax({
                    url: '/api/getstoctbyidbarang', // Replace with your route
                    method: 'GET',
                    data: {
                        id: selectedOption
                    },
                    success: function(response) {
                        $('#total_stock').val(response.data.stock);
                    },
                    error: function(xhr) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#id_rak').change(function() {
                var selectedOption = $('#id_rak').val();
                $.ajax({
                    url: '/api/getgudangbyrak', // Replace with your route
                    method: 'GET',
                    data: {
                        id: selectedOption
                    },
                    success: function(response) {
                        console.log(response);
                        $('#lokasi_gudang').val(response.data.gudang.lokasi_gudang);
                    },
                    error: function(xhr) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
