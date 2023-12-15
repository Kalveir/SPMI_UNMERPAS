@extends('.layout.main')

@section('title')
    Jenis
@endsection

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Jenis</h3>
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
                        Tambahkan Jenis
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
                                <th>Jenis</th>
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
                                        <span class="badge bg-success">Aktif</span>
                                        @else
                                        <span class="badge bg-danger">Tidak Aktif</span>
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
                                                            <select class="form-select" id="basicSelect" name="status">
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
        </section>
        {{-- modal  input jenis --}}
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
                                    <select class="form-select" id="basicSelect" name="status">
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
