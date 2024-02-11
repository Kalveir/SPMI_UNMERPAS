@extends('layout.main')
@section('tittle')
    Indikator
@endsection

@section('judul')
    Daftar Indikator
@endsection

@section('container')
    <div class="card">
        <div class="card-header">
            @can('kelola indikator')
                <a href="{{ route('indikator.create') }}" class="btn btn-outline-success mb-3">
                    <i class="fas fa-plus"></i><span> Tambah Indikator</span>
                </a>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Isi</th>
                            <th>Startegi</th>
                            <th>Indikator</th>
                            <th>Standar</th>
                            <th>Satuan</th>
                            <th>Target</th>
                            <th>Status</th>
                            @can('kelola indikator')
                                <th>Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indikator as $idk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div style="width: 300px;">
                                        {{ $idk->isi }}
                                    </div>
                                </td>
                                <td>
                                    <div style="width: 300px;">
                                        {{ $idk->strategi }}
                                    </div>
                                </td>
                                <td>
                                    <div style="width: 300px;">
                                        {{ $idk->indikator }}
                                    </div>
                                </td>
                                <td>
                                    <div style="width: 200px;">
                                        {{ $idk->standard->nama }}

                                    </div>
                                </td>
                                <td>
                                    {{ $idk->satuan }}
                                </td>
                                <td>
                                    {{ $idk->target }}
                                </td>
                                <td>
                                    @if ($idk->status == 1)
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                @can('kelola indikator')
                                    <td>
                                        <div class="d-flex center-content-between">
                                            <form action="{{ route('indikator.edit', $idk->id) }}" class="d-inline">
                                                @csrf
                                                <button class="btn icon icon-left btn-warning"><i data-feather="alert-triangle"
                                                        class="fas fa-edit"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('indikator.destroy', $idk->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn icon icon-left btn-danger" onclick="DestroyIndikator(event)"><i data-feather="alert-circle"
                                                        class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        //tanya hapus indikator
        function DestroyIndikator(event) {
            event.preventDefault();

            hapus_indikator().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_indikator() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus indikator ini..?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.isConfirmed) {
                        resolve(true); // Mengirimkan nilai true jika pengguna menekan tombol "Ya, Hapus!"
                    } else {
                        resolve(false); // Mengirimkan nilai false jika pengguna menekan tombol pembatal
                    }
                });
            });
        }
    </script>
@endsection
