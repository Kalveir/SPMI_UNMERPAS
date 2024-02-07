@extends('layout.main')
@section('tittle')
Jenis
@endsection

@section('judul')
Daftar Bobot Nilai
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
        Tambah Bobot Penilaian
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No.</th>
                <th>Indikator</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenis as $jns)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jns->nama }}</td>
                    <td>
                        @if ($jns->status == 1)
                        <span class="badge badge-success">Aktif</span>
                        @else
                        <span class="badge badge-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn icon icon-left btn-warning"data-toggle="modal"
                            data-target="#update_modal{{ $jns->id }}"><i
                                data-feather="alert-triangle"></i>Edit</button>
                        <form action="{{ route('jenis.destroy', $jns->id) }}" method="POST"
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
                {{-- modal  update jenis --}}
                <div class="modal" id="update_modal{{ $jns->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Header Modal -->
                            <div class="modal-header">
                                <h4 class="modal-title">Edit jenis</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Body Modal -->
                            <div class="modal-body">
                                <!-- Form Input -->
                                <form action="{{ route('jenis.update', $jns->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama">Nama jenis: </label>
                                        <input type="text" name="nama"
                                            value="{{ $jns->nama }}" id="nama"
                                            class="form-control" placeholder="Masukkan Nama jenis"
                                            required="required">

                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Status</label>
                                            <select class="form-control" id="basicSelect" name="status">
                                                <option value="1" @if ($jns->status == 1) selected @endif>Aktif</option>
                                                <option value="0" @if ($jns->status == 0) selected @endif>Tidak Aktif
                                                </option>
                                            </select>
                                        </fieldset>
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
 {{-- modal  input Jenis --}}
 <div class="modal" id="input_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah jenis</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form Input -->
                <form action="{{ route('jenis.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama jenis:</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            placeholder="Masukkan Nama Jenis" required autofocus>
                    </div>
                    <div class="col-md-6 mb-4">
                        <fieldset class="form-group">
                            <label for="basicInput">Status :</label>
                            <select class="form-control" id="basicSelect" name="status">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </fieldset>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection