@extends('layout.main')
@section('tittle')
Jabatan
@endsection

@section('judul')
Daftar Jabatan
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <a href="{{ route('jabatan.create') }}" class="btn btn-outline-success mb-3">
        <i class="fas fa-plus"></i><span> Tambah Jabatan</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jabatan as $jbt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jbt->name }}</td>
                    <td>
                        <form action="{{ route('jabatan.edit', $jbt->id) }}"
                            class="d-inline">
                            @csrf
                            <button class="btn icon icon-left btn-warning"><i
                                    data-feather="alert-triangle" class="fas fa-edit"></i>
                            </button>
                        </form>
                        <form action="{{ route('jabatan.destroy', $jbt->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn icon icon-left btn-danger" onclick="DestroyJabatan(event)"><i
                                    data-feather="alert-circle" class="fas fa-trash-alt"></i>
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
<script type="text/javascript">
        //tanya hapus indikator
        function DestroyJabatan(event) {
            event.preventDefault();

            hapus_jabatan().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_jabatan() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus jabatan ini..?',
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