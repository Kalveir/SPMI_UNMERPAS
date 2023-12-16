@extends('.layout.main')

@section('title')
    SPMI | Buku Standard
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Buku Standard</h5>
        <a href="{{ route('bookstandard.create') }}" class="btn btn-success mb-3">
            <span>Tambah Buku Standard</span>
        </a>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Visi dan Misi</th>
                        <th>Standard</th>
                        <th>Tujuan</th>
                        <th>Rasional</th>
                        <th>Subjek</th>
                        <th>Definisi Istilah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookstandar as $bst)
                        <tr>
                            <td>{{  $loop->iteration  }}</td>
                            <td>{!! $bst->visi_misi !!}</td>
                            <td>{{ $bst->standard->nama }}</td>
                            <td>{!! $bst->tujuan !!}</td>
                            <td>{!! $bst->rasional !!}</td>
                            <td>{!! $bst->subjek !!}</td>
                            <td>{!! $bst->definisi_istilah !!}</td>
                            <td>
                                @if ($bst->status == 1)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('bookstandard.edit', $bst->id) }}"
                                    class="d-inline">
                                    @csrf
                                    <button class="btn icon icon-left btn-warning"><i
                                            data-feather="alert-triangle"></i>
                                        Edit</button>
                                </form>
                                <form action="{{ route('bookstandard.destroy', $bst->id) }}" method="POST"
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