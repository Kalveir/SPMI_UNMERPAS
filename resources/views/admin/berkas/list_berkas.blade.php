@extends('.layout.main')

@section('title')
    SPMI | Berkas
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Berkas</h5>
        <a href="{{ route('berkas.create') }}" class="btn btn-success mb-3">
            <span>Tambah Berkas</span>
        </a>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Indikator</th>
                        <th>Standard</th>
                        <th>Program Studi</th>
                        <th>Komentar</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berkas as $brks)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brks->pegawai->nama }}</td>
                            <td>{{ $brks->indikator->indikator }}</td>
                            <td>{{ $brks->indikator->standard->nama }}</td>
                            <td>{{ $brks->prodi->nama }}</td>
                            <td>{{ $brks->komentar }}</td>
                            <td>{{ $brks->nilai }}</td>
                            <td>
                                <form action="{{ route('berkas.destroy', $brks->id) }}" method="POST"
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