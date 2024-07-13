@extends('layout')
@section('content')
<div class="row mt-4">
    <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h2 class="text-primary"><i class="fas fa-map-marker-alt mr-2"></i> Rak Barang</h2>
        <a class="btn btn-primary" href="{{ route('raks.create') }}"><i class="fas fa-plus mr-1"></i>Create New Barang</a>
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
                            <th>Lokasi Gudang</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be populated by DataTables -->
                    </tbody>
                </table>

                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h3 class="mb-0">Edit Rak</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm" action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <label for="no_rak" class="form-label"><strong>Nomor Rak:</strong></label>
                                            <input type="text" id="no_rak" name="no_rak" class="form-control" placeholder="Nomor Rak">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="id_gudang" class="form-label"><strong>Gudang:</strong></label>
                                            <select class="form-control" id="id_gudang" name="id_gudang">
                                                <option value="">Select Gudang</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(function() {
                        var table = $('.data-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('raks.index') }}",
                            columns: [
                                {data: 'id', name: 'id'},
                                {data: 'no_rak', name: 'no_rak'},
                                {data: 'lokasi_gudang', name: 'lokasi_gudang'},
                                {data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        });

                        $(document).on('click', '.edit-btn', function() {
                            var id = $(this).data('id');
                            $.ajax({
                                url: '/raks/' + id + '/edit',
                                method: 'GET',
                                success: function(data) {
                                    var rak = data.rak;
                                    var gudangs = data.gudangs;

                                    $('#editForm').attr('action', '/raks/' + id);
                                    $('#editForm #no_rak').val(rak.no_rak);

                                    // Kosongkan select dulu
                                    $('#editForm #id_gudang').empty();
                                    // Tambahkan opsi dari data gudang
                                    $.each(gudangs, function(index, gudang) {
                                        var selected = gudang.id == rak.id_gudang ? 'selected' : '';
                                        $('#editForm #id_gudang').append('<option value="' + gudang.id + '" ' + selected + '>' + gudang.id + ' - ' + gudang.lokasi_gudang + '</option>');
                                    });
                                }
                            });
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
