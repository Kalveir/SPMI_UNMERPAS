@extends('.layout.main')

@section('title')
    SPMI | Buku Standar
@endsection

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Buku Standar</h3>
                    {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
                    <a href="{{ route('bookstandard.create') }}" class="btn btn-success mb-3">
                        <span>Tambah Buku Standard</span>
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
