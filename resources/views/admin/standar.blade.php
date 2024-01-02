@extends('layout.main')
@section('tittle')
Standard
@endsection

@section('judul')
Daftar Standard
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
        Tambah Standarisasi
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($standar as $std)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $std->nama }}</td>
                    <td>
                      @if ($std->status == 1)
                          <span class="badge badge-success">Aktif</span>
                      @else
                          <span class="badge badge-danger">Tidak Aktif</span>
                      @endif
                  </td>
                    <td>
                        <button class="btn icon icon-left btn-warning"data-toggle="modal"
                            data-target="#editStandard{{ $std->id }}"><i
                                data-feather="alert-triangle" class="fas fa-edit"></i></button>

                        <form action="{{ route('standard.destroy', $std->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn icon icon-left btn-danger"><i
                                    data-feather="alert-circle" class="fas fa-trash-alt"></i>
                            
                            </button>
                        </form>
                    </td>
                </tr>
                {{-- update Standard --}}
                <div class="modal fade" id="editStandard{{ $std->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="update_fakultas{{ $std->id }}"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="update_fakultas{{ $std->id }}">
                                    Edit
                                    Standarisasi</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk mengedit data prodi -->
                                <form action="{{ route('standard.update', $std->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Isi form sesuai kebutuhan -->
                                    <div class="form-group">
                                        <label for="nama">Standard : </label>
                                        <input type="text" class="form-control" placeholder="Masukan Standarisasi" id="nama"
                                            name="nama" value="{{ $std->nama }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Status</label>
                                          <select class="form-control id="basicSelect" name="status">
                                              <option value="1" @if ($std->status == 1) selected @endif>Aktif</option>
                                              <option value="0" @if ($std->status == 0) selected @endif>Tidak Aktif
                                              </option>
                                          </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan
                                        Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end Modal --}}
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal" id="input_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Standarisasi</h4>
                <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form Input -->
                <form action="{{ route('standard.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Standarisasi :</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control"
                            placeholder="Masukan Standarisasi"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Status :</label>
                        <select class="form-control" id="basicSelect" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <!-- Footer Modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Batal</button>
                        <button type="submit"
                            class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection