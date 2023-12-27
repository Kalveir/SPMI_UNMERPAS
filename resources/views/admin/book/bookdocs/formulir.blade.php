@extends('.layout.main')

@section('title')
    SPMI | Formulir
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Formulir</h5>
        <a href="{{ route('formulir.create') }}" class="btn btn-success mb-3">
            <span>Tambah Formulir</span>
        </a>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama File</th>
                        <th>Jenis</th>
                        <th>Standard</th>
                        <th>Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formulir as $frm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $frm->nama }}</td>
                            <td>{{ $frm->standard->nama}}</td>
                            <td>{{ $frm->jenis}}</td>
                            <td>
                                <a href="{{ asset('storage/Formulir/' . $frm->nama_file) }}" target="_blank">
                                    <button class="btn btn-primary"><i class="mdi mdi-cloud-download"></i> Berkas</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('formulir.edit', $frm->id) }}"
                                    class="d-inline">
                                    @csrf
                                    <button class="btn icon icon-left btn-warning"><i
                                            data-feather="alert-triangle"></i>
                                        Edit</button>
                                </form>
                                <form action="{{ route('formulir.destroy', $frm->id) }}" method="POST"
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
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
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