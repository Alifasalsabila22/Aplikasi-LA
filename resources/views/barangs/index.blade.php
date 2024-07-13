@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-boxes mr-2"></i> Data Barang</h2>
            {{-- <a class="btn btn-success" href="{{ route('barangs.create') }}"><i class="fas fa-plus mr-1"></i>Create New
                Barang</a> --}}
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal"><i
                            class="fas fa-plus mr-1"></i>
                        Create Data Barang
                    </button>
                </div>
            </div>
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
                    <h4 class="mb-0">Barang List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover data-table">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Kelas</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Kategori</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be populated by DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('barangs.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'kode_buku',
                        name: 'kode_buku'
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
                        data: 'penerbit',
                        name: 'penerbit'
                    },
                    {
                        data: 'tahun_terbit',
                        name: 'tahun_terbit'
                    },
                    {
                        data: 'jenjang',
                        name: 'jenjang'
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
    {{-- create --}}
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="createModalLabel">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('barangs.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="kode_buku" class="form-label">Kode Buku:</label>
                                    <input type="text" name="kode_buku" class="form-control" placeholder="Kode Buku"
                                        required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="judul" class="form-label">Judul:</label>
                                    <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="kelas" class="form-label">Kelas:</label>
                                    <select class="form-control" name="id_kategori" required>
                                        <option value="">Select Kelas</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->kelas }} /
                                                {{ $kategori->jenjang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="penerbit" class="form-label">Penerbit:</label>
                                    <input type="text" name="penerbit" class="form-control" placeholder="Penerbit"
                                        required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
                                    <input type="text" name="tahun_terbit" class="form-control"
                                        placeholder="Tahun Terbit" required>
                                </div>
                                {{-- <div class="form-group mb-4">
                                <label for="id_kategori" class="form-label">Kategori:</label>
                                <select class="form-control" name="id_kategori" required>
                                    <option value="">Select Kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->jenjang }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
