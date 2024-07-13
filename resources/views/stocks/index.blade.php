@extends('layout')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2 class="text-primary"><i class="fas fa-cubes mr-2"></i> Stock</h2>
            <a class="btn btn-success" href="{{ route('stocks.create') }}"><i class="fas fa-plus mr-1"></i>Create New
                Stock</a>
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
                    <h4 class="mb-0">Data Stock Buku</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover data-table">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Kelas</th>
                                <th>Kategori</th>
                                <th>Stock</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
                ajax: "{{ route('stocks.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
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
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                            <a href="/stocks/${row.id}" class="btn btn-info btn-sm me-1"><i class="fas fa-eye"></i></a>
                                <a href="/stocks/${row.id}/edit" class="btn btn-primary btn-sm me-1"><i class="fas fa-edit"></i></a>
                                <form action="/stocks/${row.id}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>`;
                        }
                    }
                ],
                "language": {
                    "emptyTable": "No data available in table"
                }
            });
        });
    </script>
@endsection
