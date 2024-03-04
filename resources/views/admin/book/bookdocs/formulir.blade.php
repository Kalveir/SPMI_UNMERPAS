@extends('layout.main')
@section('tittle')
Formulir
@endsection

@section('judul')
Daftar Formulir
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    @can('kelola bookdocs')
    <a href="{{ route('formulir.create') }}" class="btn btn-outline-success mb-3">
        <i class="fas fa-plus"></i><span> Tambah Formulir</span>
    </a>
    @endcan
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Standar</th>
                <th>Jenis</th>
                <th>Berkas</th>
                @can('kelola bookdocs')
                <th>Aksi</th> 
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($formulir as $frm)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $frm->nama }}</td>
                    <td>{{ $frm->standard->nama}}</td>
                    <td>{{ $frm->jenis}}</td>
                    <td>
                        <a href="{{ asset('storage/Formulir/' . $frm->nama_file) }}" target="_blank">
                            <button class="btn btn-primary"><i class="fas fa-download"></i> Berkas</button>
                        </a>
                    </td>
                    @can('kelola bookdocs')
                    <td>
                        <div class="d-flex center-content-between">
                            <form action="{{ route('formulir.edit', $frm->id) }}"
                                class="d-inline">
                                @csrf
                                <button class="btn icon icon-left btn-warning"><i
                                        data-feather="alert-triangle" class="fas fa-edit"></i>
                                </button>
                            </form>
                            <form action="{{ route('formulir.destroy', $frm->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn icon icon-left btn-danger" onclick="Destroyformulir(event)"><i
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
        function Destroyformulir(event) {
            event.preventDefault();

            hapus_formulir().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_formulir() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus formulir ini..?',
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