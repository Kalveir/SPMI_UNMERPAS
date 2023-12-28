@extends('.layout.main')

@section('title')
    SPMI | Buku Manual
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Buku Manual</h5>
        @can('kelola bookmanual')
        <a href="{{ route('bookmanual.create') }}" class="btn btn-success mb-3">
            <span>Tambah Buku Manual</span>
        </a>
        @endcan
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Standard</th>
                        <th>Jenis</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookmanual as $bkm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bkm->standard->nama}}</td>
                            <td>{{ $bkm->jenis }}</td>
                            <td>
                                @if ($bkm->status == 1)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex center-content-between">
                                    @can('kelola bookmanual')
                                    <form action="{{ route('bookmanual.edit', $bkm->id) }}" method="GET" class="mb-2">
                                        @csrf
                                        <button class="btn icon icon-left btn-warning"><i data-feather="alert-triangle"></i>Edit</button>
                                    </form>
                                    @endcan
                                    <form action="{{ route('bookmanual.show', $bkm->id) }}" method="GET" class="mb-2">
                                        @csrf
                                        <button class="btn icon icon-left btn-info"><i data-feather="alert-triangle"></i>Detail</button>
                                    </form>
                                    @can('kelola bookmanual')
                                    <form action="{{ route('bookmanual.destroy', $bkm->id) }}" method="POST" class="mb-2">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn icon icon-left btn-danger"><i data-feather="alert-circle"></i>Hapus</button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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