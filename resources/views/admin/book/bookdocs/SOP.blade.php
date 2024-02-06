@extends('layout.main')
@section('tittle')
SOP
@endsection

@section('judul')
Daftar SOP
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    @can('kelola bookdocs')
    <a href="{{ route('SOP.create') }}" class="btn btn-outline-success mb-3">
        <i class="fas fa-plus"></i><span> Tambah SOP</span>
    </a>
    @endcan
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Standard</th>
                <th>Jenis</th>
                <th>Berkas</th>
                @can('kelola bookdocs')
                <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($sop as $sp)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sp->nama }}</td>
                    <td>{{ $sp->standard->nama}}</td>
                    <td>{{ $sp->jenis}}</td>
                    <td>
                        <a href="{{ asset('storage/SOP/' . $sp->nama_file) }}" target="_blank">
                            <button class="btn btn-primary"><i class="fas fa-download"></i> Berkas</button>
                        </a>
                    </td>
                    @can('kelola bookdocs')
                    <td>
                        <div class="d-flex center-content-between">
                            <form action="{{ route('SOP.edit', $sp->id) }}"
                                class="d-inline">
                                @csrf
                                <button class="btn icon icon-left btn-warning"><i
                                        data-feather="alert-triangle" class="fas fa-edit"></i>
                                </button>
                            </form>
                            <form action="{{ route('SOP.destroy', $sp->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn icon icon-left btn-danger" onclick="Destroysop(event)"><i
                                        data-feather="alert-circle" class="fas fa-trash-alt"></i>
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
        function Destroysop(event) {
            event.preventDefault();

            hapus_sop().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_sop() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus SOP ini..?',
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