@extends('.layout.main')

@section('title')
    SPMI | Berkas
@endsection

@section('container')
<style>
.dropdown-menu {
    z-index: 1000; /* Atur nilai z-index sesuai kebutuhan */
}
</style>

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
                        <th>Berkas</th>
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
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">1. Penetapan</button>
                                    <div class="dropdown-menu">
                                        @foreach ( $brks->pengisian_berkas as $file_berkas )
                                            @if ($file_berkas->jenis == 'Penetapan')
                                                <a class="dropdown-item" href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank">{{ $file_berkas->nama_file }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">2. Pelaksanaan</button>
                                    <div class="dropdown-menu">
                                        @foreach ( $brks->pengisian_berkas as $file_berkas )
                                            @if ($file_berkas->jenis == 'Pelaksanaan')
                                                <a class="dropdown-item" href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank">{{ $file_berkas->nama_file }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </td>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
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