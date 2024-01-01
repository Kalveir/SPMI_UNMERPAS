@extends('layout.main')
@section('tittle')
Program Studi
@endsection

@section('judul')
Daftar Program Studi
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
        Tambah Program Studi
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Program Studi</th>
                <th>Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodi as $pd)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pd->nama }}</td>
                    <td>{{ $pd->fakultas->nama }}</td>
                    <td>
                        <button class="btn icon icon-left btn-warning"data-toggle="modal"
                            data-target="#editProdi{{ $pd->id }}"><i
                                data-feather="alert-triangle"></i>Edit</button>

                        <form action="{{ route('prodi.destroy', $pd->id) }}" method="POST"
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
                {{-- update Prodi --}}
                <div class="modal fade" id="editProdi{{ $pd->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="update_prodi{{ $pd->id }}"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="update_prodi{{ $pd->id }}">
                                    Edit
                                    Data Prodi</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk mengedit data prodi -->
                                <form action="{{ route('prodi.update', $pd->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Isi form sesuai kebutuhan -->
                                    <div class="form-group">
                                        <label for="nama">Nama Prodi : </label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Program Studi" id="nama"
                                            name="nama" value="{{ $pd->nama }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Fakultas</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            name="fakultas_id">
                                            @foreach ($fakultas as $fkt)
                                                <option value="{{ $fkt->id }}"
                                                    {{ $pd->fakultas_id == $fkt->id ? 'selected' : '' }}>
                                                    {{ $fkt->nama }}
                                                </option>
                                            @endforeach
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
                <h4 class="modal-title">Tambah Program Studi</h4>
                <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form Input -->
                <form action="{{ route('prodi.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Prodi :</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control"
                            placeholder="Masukkan Nama Program Studi"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Fakultas :</label>
                        <select class="form-control" id="exampleFormControlSelect1"
                            name="fakultas_id">
                            @foreach ($fakultas as $fkt)
                                <option value="{{ $fkt->id }}">
                                    {{ $fkt->nama }}
                                </option>
                            @endforeach
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
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection