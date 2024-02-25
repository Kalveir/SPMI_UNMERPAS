@extends('layout.main')
@section('tittle')
Skor Nilai
@endsection

@section('judul')
Daftar Skor Nilai
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <a href="{{ route('nilai.create') }}" class="btn btn-outline-success mb-3">
        <i class="fas fa-plus"></i><span> Tambah Skor Penilaian</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Indikator</th>
                <th>Deskripsi</th>
                <th>Nilai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $nli)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $nli->indikator->indikator }}</td>
                    <td>{!! $nli->deskripsi !!}</td>
                    <td>{{ $nli->nilai }}</td>
                    <td>
                        @if ($nli->status == 1)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex center-content-between">
                            
                        <form action="{{ route('nilai.edit', $nli->id) }}"
                            class="d-inline">
                            @csrf
                            <button class="btn icon icon-left btn-warning"><i
                                    data-feather="alert-triangle" class="fas fa-edit"></i>
                            </button>
                        </form>
                        <form action="{{ route('nilai.destroy', $nli->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn icon icon-left btn-danger" onclick="DestroyNilai(event)"><i
                                    data-feather="alert-circle" class="fas fa-trash-alt"></i>
                            </button>
                        </form>
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
    //tanya hapus buku manual
        function DestroyNilai(event) {
            event.preventDefault();

            hapus_nilai().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_nilai() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus Skor Nilai ini..?',
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