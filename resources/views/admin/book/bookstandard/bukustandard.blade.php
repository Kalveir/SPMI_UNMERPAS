@extends('layout.main')
@section('tittle')
Buku Standard
@endsection

@section('judul')
Daftar Buku Standard
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    @can('kelola bookstandard')
    <a href="{{ route('bookstandard.create') }}" class="btn btn-outline-success mb-3">
        <i class="fas fa-plus"></i><span> Tambah Buku Standard</span>
    </a>
    @endcan
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Standard</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookstandar as $bst)
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $bst->standard->nama }}</td>
                    <td>
                        @if ($bst->status == 1)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex center-content-between">
                            @can('kelola bookstandard')
                            <form action="{{ route('bookstandard.edit', $bst->id) }}"
                                class="d-inline">
                                @csrf
                                <button class="btn icon icon-left btn-warning"><i
                                        data-feather="alert-triangle" class="fas fa-edit"></i>
                                </button>
                            </form>
                            @endcan
                            <form action="{{ route('bookstandard.show', $bst->id) }}"
                                class="d-inline">
                                @csrf
                                <button class="btn icon icon-left btn-primary"><i
                                        data-feather="alert-triangle" class="fas fa-eye"></i>
                                </button>
                            </form>
                            @can('kelola bookstandard')
                            <form action="{{ route('bookstandard.destroy', $bst->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn icon icon-left btn-danger" onclick="DestroyStandar(event)"><i
                                        data-feather="alert-circle" class="fas fa-trash-alt"></i>
                                
                                </button>
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
<script type="text/javascript">
     //tanya hapus buku standar
        function DestroyStandar(event) {
            event.preventDefault();

            hapus_bookstandar().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_bookstandar() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus buku standar ini..?',
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