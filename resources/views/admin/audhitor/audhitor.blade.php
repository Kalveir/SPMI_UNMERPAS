@extends('layout.main')
@section('tittle')
Audhitor
@endsection

@section('judul')
Daftar Audhitor
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <a href="{{ route('audhitor.create') }}" class="btn btn-success mb-3">
        <span>Tambah Audhitor</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Jabatan</th>
                <th>Audhitor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai_audhitor as $audhitor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $audhitor['user']->nama }}</td> 
                    <td>{{ $audhitor['user']->prodi->nama }}</td>
                    <td>{{ $audhitor['jabatanRole'] }}</td>
                    <td>{{ $audhitor['audhitorRole'] }}</td>
                    <td> 
                      <form action="{{ route('audhitor.destroy', $audhitor['user']->id) }}" method="POST"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn icon icon-left btn-danger"onclick="DestroyAuditor(event)"><i
                                data-feather="alert-circle" class="fas fa-trash"></i>
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
        function DestroyAuditor(event) {
            event.preventDefault();

            hapus_auditor().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_auditor() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus Auditor ini..?',
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