@extends('.layout.main')

@section('title')
    SPMI | Standard
@endsection

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Standard</h3>
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
                        Tambah Standarisasi
                    </button>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col">
                            <table class="table table-striped" id="table1">
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
            </div>
        </section>
        {{-- modal  input Standarisasi --}}
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
                            <div class="col-md-6 mb-4">
                              <fieldset class="form-group">
                                  <label for="basicInput">Status :</label>
                                  <select class="form-select" id="basicSelect" name="status">
                                      <option value="1">Aktif</option>
                                      <option value="0">Tidak Aktif</option>
                                  </select>
                              </fieldset>
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
        {{-- end Modal --}}
        {{-- modal --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- DataTables CSS dan JS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#table1').DataTable();
            });
        </script>

        <script src="assets/js/main.js"></script>
    </div>
@endsection
