@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-boxes mr-2"></i> Data Barang Keluar</h2>
            <a class="btn btn-success" href="{{ route('create.transaksibarangkeluar') }}"><i
                    class="fas fa-plus mr-1"></i>Create New
                Transaksi</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Barang List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover data-table">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Nomor Transaksi</th>
                                    <th>Lokasi Gudang</th>
                                    <th>Judul Buku</th>
                                    <th>Kelas</th>
                                    <th>Kategori</th>
                                    <th>Rak</th>
                                    <th>Jumlah Keluar</th>
                                    <th>Total Stock</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <script type="text/javascript">
                            $(function() {
                                var table = $('.data-table').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    ajax: "{{ route('transaksi.out') }}",
                                    columns: [{
                                            data: 'id',
                                            name: 'id'
                                        },
                                        {
                                            data: 'tanggal_keluar',
                                            name: 'tanggal_keluar'
                                        },
                                        {
                                            data: 'no_transaksi',
                                            name: 'no_transaksi'
                                        },
                                        {
                                            data: 'lokasi_gudang',
                                            name: 'lokasi_gudang'
                                        },
                                        {
                                            data: 'judul',
                                            name: 'judul'
                                        },
                                        {
                                            data: 'kelas',
                                            name: 'kelas'
                                        },
                                        {
                                            data: 'jenjang',
                                            name: 'jenjang'
                                        },
                                        {
                                            data: 'rak',
                                            name: 'rak'
                                        },
                                        {
                                            data: 'jumlah_keluar',
                                            name: 'jumlah_keluar'
                                        },
                                        {
                                            data: 'stock_saat_ini',
                                            name: 'stock_saat_ini'
                                        },
                                        {
                                            data: 'status',
                                            name: 'status'
                                        },
                                        {
                                            data: 'action',
                                            name: 'action',
                                            orderable: false,
                                            searchable: false
                                        }
                                    ]
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection