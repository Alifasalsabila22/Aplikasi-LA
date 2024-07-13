@extends('layout')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Cetak Laporan</h3>
            </div>
            <div class="card-body" style="border-radius: 8px">
                <div class="card mb-4 shadow-sm">
                    <h4 style="margin:20px 30px 20px; color:black; font-size:25px;">Filter Data Keluar</h4>
                    <div class="card-body">
                        <form method="GET" action="{{ route('form_cetak_laporan_keluar') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="start_date">Tanggal Awal:</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="end_date">Tanggal Akhir:</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="id_gudang">Lokasi Gudang:</label>
                                    <select class="form-control" id="id_gudang" name="id_gudang" required>
                                        <option value="">Select Lokasi Gudang</option>
                                        @foreach ($gudangs as $gudang)
                                            <option value="{{ $gudang->id }}">
                                                {{ $gudang->lokasi_gudang }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <div id="buttonContainer"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-5">
                    <p>Laporan Data Barang Keluar Dari Tanggal {{ $start_date }} - {{ $end_date }}</p>
                    @can('transaksi-keluar-cetak')
                        <form method="POST" action="{{ route('printReportKeluar') }}">
                            @csrf
                            <input type="text" name="start_date" value="{{ $start_date }}" hidden>
                            <input type="text" name="end_date" value="{{ $end_date }}" hidden>
                            <input type="text" name="id_gudang" value="{{ $id_gudang }}" hidden>
                            <button class="btn btn-primary" type="submit">Cetak</button>
                        </form>
                    @endcan
                    <table id="reportTable" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nomor Transaksi</th>
                                <th>Tanggal Keluar</th>
                                <th>Judul Buku</th>
                                <th>Kategori</th>
                                <th>Jumlah Keluar</th>
                                <th>Rak</th>
                                <th>Total Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKeluar as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->no_transaksi }}</td>
                                    <td>{{ $item->tanggal_keluar }}</td>
                                    <td>{{ $item->barang->judul }}</td>
                                    <td>{{ $item->barang->kategori->jenjang }}/{{ $item->barang->kategori->kelas }}</td>
                                    <td>{{ $item->jumlah_keluar }}</td>
                                    <td>{{ $item->rak->no_rak ?? 'N/A' }}</td>
                                    <td>{{ $item->total_stock }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @can('laporan-keluar-export')
        <script>
            $(document).ready(function() {
                var table = $('#reportTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'excel',
                            className: 'btn btn-success mr-2',
                            text: '<i class="fas fa-file-excel"></i> Export'
                        },

                    ],
                    searching: false // Disable search functionality
                });

                table.buttons().container().appendTo('#buttonContainer');
            });
        </script>
    @endcan
@endsection
