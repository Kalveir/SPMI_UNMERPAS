@extends('layout.main')

@section('title')
    Contoh
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Fakultas</h5>
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
            Tambah Fakultas
        </button>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
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
                                <form action="{{ route('fakultas.destroy', encrypt($fkt->id)) }}" method="POST"
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
{{-- modal  input Fakultas --}}
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