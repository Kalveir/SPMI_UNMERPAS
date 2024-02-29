@extends('layout.main')
@section('tittle')
Fakultas
@endsection

@section('judul')
Daftar Fakultas
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <button type="button" class="btn btn-outline-success mb-3" data-toggle="modal" data-target="#input_modal">
        <i class="fas fa-plus"></i><span> Tambah Fakultas</span>
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Nama Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fakultas as $fkt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $fkt->nama }}</td>
                    <td>
                        <button class="btn icon icon-left btn-warning"data-toggle="modal"
                            data-target="#update_modal{{ $fkt->id }}"><i
                                data-feather="alert-triangle" class="fas fa-edit"></i></button>
                        <form action="{{ route('fakultas.destroy', $fkt->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn icon icon-left btn-danger" onclick="DestroyFakultas(event)"><i
                                    data-feather="alert-circle" class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                {{-- modal  update Fakultas --}}
                <div class="modal" id="update_modal{{ $fkt->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Header Modal -->
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Fakultas</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Body Modal -->
                            <div class="modal-body">
                                <!-- Form Input -->
                                <form action="{{ route('fakultas.update', encrypt($fkt->id)) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama">Nama Fakultas: </label>
                                        <input type="text" name="nama"
                                            value="{{ $fkt->nama }}" id="nama"
                                            class="form-control" placeholder="Masukkan Nama Fakultas"
                                            required>

                                    </div>
                            </div>

                            <!-- Footer Modal -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End modal --}}
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal" id="input_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Fakultas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form Input -->
                <form action="{{ route('fakultas.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Fakultas:</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            placeholder="Masukkan Nama Fakultas" required>
                    </div>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- modal --}}
{{-- modal --}}
<script type="text/javascript">
        //tanya hapus indikator
        function DestroyFakultas(event) {
            event.preventDefault();

            hapus_fakultas().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_fakultas() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus fakultas ini..?',
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection