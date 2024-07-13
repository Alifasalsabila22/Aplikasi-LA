@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left py-4 d-flex justify-content-between ">
                <h2>Add Barang Masuk </h2>
                <a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
            </div>
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

    <form action="{{ route('transaksis.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="no_transaksi">No Transaksi:</label>
                            <input type="text" name="no_transaksi" class="form-control" placeholder="Nomor Transaksi">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk:</label>
                            <input type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk">Lokasi Gudang:</label>
                            <input type="text" id="lokasi_gudang" name="lokasi_gudang" class="form-control"
                                placeholder="" readonly>
                        </div>
                        {{-- <div class="form-group">
                            <label for="id_gudang">Lokasi Gudang:</label>
                            <select class="form-control" name="id_gudang">
                                <option value="">Select Lokasi Gudang</option>
                                @foreach ($gudangs as $gudang)
                                    <option value="{{ $gudang->id }}">{{ $gudang->lokasi_gudang }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="id_gudang">Lokasi Rak:</label>
                            <select class="form-control" id="id_rak" name="id_rak">
                                <option value="">Select Lokasi Rak</option>
                                @foreach ($raks as $rak)
                                    <option value="{{ $rak->id }}">{{ $rak->no_rak }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="id_barang">Judul Buku:</label>
                            <select class="form-control" name="id_barang" id="id_barang">
                                <option value="">Select Judul Buku</option>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id }}">
                                        {{ $barang->judul . ' (' . $barang->kategori?->jenjang . ' kelas : ' . $barang->kategori?->kelas . ')' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_masuk">Jumlah Masuk:</label>
                            <input type="number" name="jumlah_masuk" class="form-control" placeholder="Jumlah Masuk">
                        </div>
                        <div class="form-group">
                            <label for="total_stock">Total Stock:</label>
                            <input type="number" id="total_stock" name="total_stock" class="form-control"
                                placeholder="Total Stock" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" id="status" name="status" value="In" class="form-control"
                                placeholder="In" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

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
