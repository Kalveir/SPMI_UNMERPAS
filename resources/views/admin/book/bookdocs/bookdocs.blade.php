@extends('.layout.main')

@section('title')
    SPMI | Buku Docs
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar BookDocs</h5>
        <a href="{{ route('bookdocs.create') }}" class="btn btn-success mb-3">
            <span>Tambah Buku Docs</span>
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
                    @foreach ($bookdocs as $bkm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bkm->nama }}</td>
                            <td>{{ $bkm->standard->nama}}</td>
                            <td>{{ $bkm->jenis}}</td>
                            <td>
                                <a href="{{ asset('storage/SOP/' . $bkm->nama_file) }}" target="_blank">
                                    <button class="btn btn-primary">Berkas</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('bookdocs.edit', $bkm->id) }}"
                                    class="d-inline">
                                    @csrf
                                    <button class="btn icon icon-left btn-warning"><i
                                            data-feather="alert-triangle"></i>
                                        Edit</button>
                                </form>
                                <form action="{{ route('bookdocs.destroy', $bkm->id) }}" method="POST"
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