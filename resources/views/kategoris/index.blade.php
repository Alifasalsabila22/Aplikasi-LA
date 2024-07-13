@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2><i class="fas fa-th-list mr-2"></i> Kategori</h2>
            <a class="btn btn-success" href="{{ route('kategoris.create') }}">Buat Kategori Baru</a>
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
                    <h4 class="mb-0">Data Kategori Buku</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover data-table">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Jenjang</th>
                                    <th>Kelas</th>
                                    <th width="280px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kategoris.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'jenjang',
                        name: 'jenjang'
                    },
                    {
                        data: 'kelas',
                        name: 'kelas'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <a href="/kategoris/${row.id}" class="btn btn-info btn-sm me-1"><i class="fas fa-eye"></i></a>
                                <a href="/kategoris/${row.id}/edit" class="btn btn-primary btn-sm me-1"><i class="fas fa-edit"></i></a>
                                <form action="/kategoris/${row.id}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>`;
                        }
                    }
                ]
            });
        });
    </script>
@endsection
