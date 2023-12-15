@extends('.layout.main')

@section('title')
    SPMI | Program Studi
@endsection

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Program Studi</h3>
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
                        Tambah Program Studi
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
                                            role="dialog" aria-labelledby="update_fakultas{{ $pd->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="update_fakultas{{ $pd->id }}">
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
                                                                <label for="fakultas_id">Fakultas</label>
                                                                <select class="form-select" id="fakultas_id"
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
            </div>
        </section>
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
