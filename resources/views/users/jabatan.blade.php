@extends('.layout.main')

@section('title')
    Jabatan
@endsection

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Jabatan</h3>
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
                        Tambah Jabatan
                    </button>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatan as $jbt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jbt->nama }}</td>
                                    <td>
                                        <button class="btn icon icon-left btn-warning"data-toggle="modal"
                                            data-target="#update_modal{{ $jbt->id }}"><i
                                                data-feather="alert-triangle"></i>Edit</button>
                                        <form action="{{ route('jabatan.destroy', $jbt->id) }}" method="POST"
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
                                {{-- modal  update Jabatan --}}
                                <div class="modal" id="update_modal{{ $jbt->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Header Modal -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Jabatan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Body Modal -->
                                            <div class="modal-body">
                                                <!-- Form Input -->
                                                <form action="{{ route('jabatan.update', $jbt->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nama">Nama Jabatan: </label>
                                                        <input type="text" name="nama"
                                                            value="{{ $jbt->nama }}" id="nama"
                                                            class="form-control" placeholder="Masukkan Nama Jabatan"
                                                            required="required">

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
        </section>
        {{-- modal  input Jabatan --}}
        <div class="modal" id="input_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Header Modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Jabatan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Body Modal -->
                    <div class="modal-body">
                        <!-- Form Input -->
                        <form action="{{ route('jabatan.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Jabatan:</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukkan Nama Jabatan" required="required">
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

        <script src="/assets/js/main.js"></script>
    </div>
@endsection
