@extends('layout')

@section('content')
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-
                
                white">
                    <h3 class="mb-0">Edit Rak</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="{{ route('raks.update', $rak->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="no_rak" class="form-label"><strong>Nomor Rak:</strong></label>
                                <input type="text" name="no_rak" value="{{ $rak->no_rak }}" class="form-control"
                                    placeholder="Nomor Rak">
                            </div>
                            <div class="col-md-6">
                                <label for="id_gudang" class="form-label"><strong>Gudang:</strong></label>
                                <select class="form-control" name="id_gudang">
                                    <option value="">Select Gudang</option>
                                    @foreach ($gudangs as $gudang)
                                        <option value="{{ $gudang->id }}"
                                            {{ $gudang->id == $rak->id_gudang ? 'selected' : '' }}>
                                            {{ $gudang->id }} - {{ $gudang->lokasi_gudang }}
                                        </option>
                                    @endforeach
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

    <script>
        $(function() {
            $('#editModal').modal('show');
        });
    </script>
@endsection
