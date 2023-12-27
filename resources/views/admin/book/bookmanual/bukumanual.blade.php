@extends('.layout.main')

@section('title')
    SPMI | Buku Manual
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Buku Manual</h5>
        <a href="{{ route('bookmanual.create') }}" class="btn btn-success mb-3">
            <span>Tambah Buku Manual</span>
        </a>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Visi dan Misi</th>
                        <th>Jenis</th>
                        <th>Standard</th>
                        <th>Ruang Lingkup</th>
                        <th>Tujuan</th>
                        <th>Definisi Istilah</th>
                        <th>Tahapan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookmanual as $bkm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! $bkm->visi_misi !!}</td>
                            <td>{{ $bkm->jenis }}</td>
                            <td>{{ $bkm->standard->nama}}</td>
                            <td>{!! $bkm->ruanglingkup !!}</td>
                            <td>{!! $bkm->tujuan !!}</td>
                            <td>{!! $bkm->definisi_istilah !!}</td>
                            <td>{!! $bkm->tahapan !!}</td>
                            <td>
                                @if ($bkm->status == 1)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('bookmanual.edit', $bkm->id) }}"
                                    class="d-inline">
                                    @csrf
                                    <button class="btn icon icon-left btn-warning"><i
                                            data-feather="alert-triangle"></i>
                                        Edit</button>
                                </form>
                                <form action="{{ route('bookmanual.destroy', $bkm->id) }}" method="POST"
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