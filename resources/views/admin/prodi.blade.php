@extends('layout.main')
@section('tittle')
Program Studi
@endsection

@section('judul')
Daftar Program Studi
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <button type="button" class="btn btn-outline-success mb-3" data-toggle="modal" data-target="#input_modal">
        <i class="fas fa-plus"></i><span> Tambah Program Studi</span>
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Nama Program Studi</th>
                <th>Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodi as $pd)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pd->nama }}</td>
                    <td>{{ $pd->fakultas->nama }}</td>
                    <td>
                        <div class="d-flex center-content-between">
                            <button class="btn icon icon-left btn-warning"data-toggle="modal"
                                data-target="#editProdi{{ $pd->id }}"><i
                                    data-feather="alert-triangle" class="fas fa-edit"></i></button>

                            <form action="{{ route('prodi.destroy', $pd->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn icon icon-left btn-danger" onclick="DestroyProdi(event)"><i
                                        data-feather="alert-circle" class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                {{-- update Prodi --}}
                <div class="modal fade" id="editProdi{{ $pd->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="update_prodi{{ $pd->id }}"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="update_prodi{{ $pd->id }}">
                                    Edit
                                    Data Prodi</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk mengedit data prodi -->
                                <form action="{{ route('prodi.update', $pd->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Isi form sesuai kebutuhan -->
                                    <div class="form-group">
                                        <label for="nama">Nama Prodi : </label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Program Studi" id="nama"
                                            name="nama" value="{{ $pd->nama }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Fakultas</label>
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            name="fakultas_id">
                                            @foreach ($fakultas as $fkt)
                                                <option value="{{ $fkt->id }}"
                                                    {{ $pd->fakultas_id == $fkt->id ? 'selected' : '' }}>
                                                    {{ $fkt->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan
                                        Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end Modal --}}
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal" id="input_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Program Studi</h4>
                <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form Input -->
                <form action="{{ route('prodi.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Prodi :</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control"
                            placeholder="Masukkan Nama Program Studi"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Fakultas :</label>
                        <select class="form-control" id="exampleFormControlSelect1"
                            name="fakultas_id">
                            @foreach ($fakultas as $fkt)
                                <option value="{{ $fkt->id }}">
                                    {{ $fkt->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Footer Modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Batal</button>
                        <button type="submit"
                            class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        //tanya hapus indikator
        function DestroyProdi(event) {
            event.preventDefault();

            hapus_prodi().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_prodi() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus prodi ini..?',
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
