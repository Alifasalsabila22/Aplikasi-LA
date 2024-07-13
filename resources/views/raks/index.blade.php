@extends('layout')
@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-map-marker-alt mr-2"></i> Rak Barang</h2>
            <a class="btn btn-success" href="{{ route('raks.create') }}"><i class="fas fa-plus mr-1"></i>Create New Barang</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Data Rak Barang</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover data-table">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nomor Rak</th>
                                {{-- <th>Judul Buku</th> --}}
                                {{-- <th>Kelas</th> --}}
                                {{-- <th>Kategori</th> --}}
                                <th>Lokasi Gudang</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Data will be populated by DataTables -->
                        </tbody>
                    </table>

                    <script type="text/javascript">
                        $(function() {
                            var table = $('.data-table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: "{{ route('raks.index') }}",
                                columns: [{
                                        data: 'id',
                                        name: 'id'
                                    },
                                    {
                                        data: 'no_rak',
                                        name: 'no_rak'
                                    },
                                    // {
                                    //     data: 'judul',
                                    //     name: 'judul'
                                    // },
                                    // {
                                    //     data: 'kelas',
                                    //     name: 'kelas'
                                    // },
                                    // {
                                    //     data: 'jenjang',
                                    //     name: 'jenjang'
                                    // },
                                    {
                                        data: 'lokasi_gudang',
                                        name: 'lokasi_gudang'
                                    },
                                    {
                                        data: 'action',
                                        name: 'action',
                                        orderable: false,
                                        searchable: false
                                    },
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <style>
        .card {
            border: 1px solid #007bff;
            border-radius: 5px;
        }

        .card-body {
            padding: 20px;
        }

        .thead-dark th {
            background-color: #343a40;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
@endsection
