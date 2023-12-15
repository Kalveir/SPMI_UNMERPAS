@extends('layout.main')

@section('title')
    SPMI | Program Studi
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Program Studi</h5>
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
                Tambah Standarisasi
            </button>
        </button>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
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
                                  <span class="badge bg-success">Aktif</span>
                              @else
                                  <span class="badge bg-danger">Tidak Aktif</span>
                              @endif
                          </td>
                            <td>
                                <button class="btn icon icon-left btn-warning"data-toggle="modal"
                                    data-target="#editStandard{{ $std->id }}"><i
                                        data-feather="alert-triangle"></i>Edit</button>

                                <form action="{{ route('standard.destroy', $std->id) }}" method="POST"
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
                                            <div class="col-md-6 mb-4">
                                              <fieldset class="form-group">
                                                  <label for="basicInput">Status</label>
                                                  <select class="form-select" id="basicSelect" name="status">
                                                      <option value="1" @if ($std->status == 1) selected @endif>Aktif</option>
                                                      <option value="0" @if ($std->status == 0) selected @endif>Tidak Aktif
                                                      </option>
                                                  </select>
                                              </fieldset>
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
{{-- modal  input Program Studi --}}
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
                        <label for="fakultas_id">Fakultas :</label>
                        <select class="form-select" id="fakultas_id"
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
    {{-- end modal --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection