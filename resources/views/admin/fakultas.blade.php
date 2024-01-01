@extends('layout.main')
@section('tittle')
Fakultas
@endsection

@section('judul')
Daftar Fakultas
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
        Tambah Fakultas
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fakultas as $fkt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $fkt->nama }}</td>
                    <td>
                        <button class="btn icon icon-left btn-warning"data-toggle="modal"
                            data-target="#update_modal{{ $fkt->id }}"><i
                                data-feather="alert-triangle"></i>Edit</button>
                        <form action="{{ route('fakultas.destroy', $fkt->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn icon icon-left btn-danger"><i
                                    data-feather="alert-circle"></i>
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                {{-- modal  update Fakultas --}}
                <div class="modal" id="update_modal{{ $fkt->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Header Modal -->
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Fakultas</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Body Modal -->
                            <div class="modal-body">
                                <!-- Form Input -->
                                <form action="{{ route('fakultas.update', encrypt($fkt->id)) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama">Nama Fakultas: </label>
                                        <input type="text" name="nama"
                                            value="{{ $fkt->nama }}" id="nama"
                                            class="form-control" placeholder="Masukkan Nama Fakultas"
                                            required>

                                    </div>
                            </div>

                            <!-- Footer Modal -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End modal --}}
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal" id="input_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Fakultas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form Input -->
                <form action="{{ route('fakultas.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Fakultas:</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            placeholder="Masukkan Nama Fakultas" required>
                    </div>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- modal --}}
{{-- modal --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection