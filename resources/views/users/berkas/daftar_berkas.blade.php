@extends('.layout.main')

@section('title')
    SPMI | Pengisian Berkas
@endsection

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Berkas</h3>
                    {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
                    <a href="{{ route('berkas.create') }}" class="btn btn-success mb-3">
                        <span>Tambah Berkas</span>
                    </a>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Pegawai</th>
                                        <th>Indikator</th>
                                        <th>Berkas</th>
                                        {{-- <th>Penetapan</th> --}}
                                        {{-- <th>Pelaksanaan</th>
                                        <th>Evaluasi</th>
                                        <th>Jenis</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($berkas as $bks)
                                        <tr>
                                            <td>{{ $bks->pegawai->nama }}</td>
                                            <td>{{ $bks->indikator->indikator }}</td>
                                            
                                            <td>
                                                <a href="{{ asset('storage/berkas/' . $bks->nama_file) }}" target="_blank">
                                                    <button class="btn btn-primary">Berkas</button>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('berkas.edit', $bks->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    <button class="btn icon icon-left btn-warning"><i
                                                            data-feather="alert-triangle"></i>
                                                        Edit</button>
                                                </form>
                                                <form action="{{ route('berkas.destroy', $bks->id) }}" method="POST"
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
            </div>
        </section>
        <!-- jQuery -->
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
