@extends('layout')

@section('content')
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="mb-0">Form Edit Barang</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="{{ route('barangs.update', $barang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="kode_buku" class="form-label"><strong>Kode Buku:</strong></label>
                                <input type="text" name="kode_buku" value="{{ $barang->kode_buku }}" class="form-control"
                                    placeholder="Kode Buku">
                            </div>
                            <div class="col-md-6">
                                <label for="judul" class="form-label"><strong>Judul:</strong></label>
                                <input type="text" name="judul" value="{{ $barang->judul }}" class="form-control"
                                    placeholder="Judul">
                            </div>
                            <div class="col-md-6">
                                <label for="id_kategori" class="form-label"><strong>Kelas:</strong></label>
                                <select class="form-control" name="id_kategori" required>
                                    <option value="">Select Kelas</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $kategori->id == $barang->id_kategori ? 'selected' : '' }}>
                                            {{ $kategori->kelas }} / {{ $kategori->jenjang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="penerbit" class="form-label"><strong>Penerbit:</strong></label>
                                <input type="text" name="penerbit" value="{{ $barang->penerbit }}" class="form-control"
                                    placeholder="Penerbit">
                            </div>
                            <div class="col-md-6">
                                <label for="tahun_terbit" class="form-label"><strong>Tahun Terbit:</strong></label>
                                <input type="text" name="tahun_terbit" value="{{ $barang->tahun_terbit }}"
                                    class="form-control" placeholder="Tahun Terbit">
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
