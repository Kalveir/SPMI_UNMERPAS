@extends('layout.main')
@section('tittle')
Standard
@endsection
@section('judul')
Daftar Standar
@endsection
@section('container')
<div class="card">
    <div class="card-header">
        @can('kelola standard')
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
            Tambah Standar
        </button>
        @endcan
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Status</th>
                @can('kelola standard')
                <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($standar as $std)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $std->nama }}</td>
                    <td>
                      @if ($std->status == 1)
                          <span class="badge badge-success">Aktif</span>
                      @else
                          <span class="badge badge-danger">Tidak Aktif</span>
                      @endif
                  </td>
                  @can('kelola standard')
                    <td>
                        <button class="btn icon icon-left btn-warning"data-toggle="modal"
                            data-target="#editStandard{{ $std->id }}"><i
                                data-feather="alert-triangle" class="fas fa-edit"></i></button>

                        <form action="{{ route('standard.destroy', $std->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn icon icon-left btn-danger" onclick="destroyStandard(event)"><i
                                    data-feather="alert-circle" class="fas fa-trash-alt"></i>

                            </button>
                        </form>
                    </td>
                    @endcan
                </tr>
                {{-- update Standard --}}
                <div class="modal fade" id="editStandard{{ $std->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="update_fakultas{{ $std->id }}"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="update_fakultas{{ $std->id }}">
                                    Edit
                                    Standar</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form untuk mengedit data prodi -->
                                <form action="{{ route('standard.update', $std->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Isi form sesuai kebutuhan -->
                                    <div class="form-group">
                                        <label for="nama">Standard : </label>
                                        <input type="text" class="form-control" placeholder="Masukan Standar" id="nama"
                                            name="nama" value="{{ $std->nama }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Status</label>
                                          <select class="form-control id="basicSelect" name="status">
                                              <option value="1" @if ($std->status == 1) selected @endif>Aktif</option>
                                              <option value="0" @if ($std->status == 0) selected @endif>Tidak Aktif
                                              </option>
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
                <h4 class="modal-title">Tambah Standar</h4>
                <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form Input -->
                <form action="{{ route('standard.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Standar :</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control"
                            placeholder="Masukan Standar"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Status :</label>
                        <select class="form-control" id="basicSelect" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
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
    {{-- end modal --}}
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
        //tanya hapus standar
        function destroyStandard(event) {
            event.preventDefault();

            hapus_standar().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_standar() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus standar ini..?',
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
