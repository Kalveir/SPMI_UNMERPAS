@extends('layout.main')
@section('tittle')
Bobot Nilai
@endsection

@section('judul')
Daftar Bobot Nilai
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <a href="{{ route('bobot.create') }}" class="btn btn-outline-success mb-3">
      <i class="fas fa-plus"></i><span>Tambah Bobot Nilai</span>
  </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Standar</th>
                <th>Indikator</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bobot as $bbt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bbt->indikator->standard->nama }}</td>
                    <td>{{ $bbt->indikator->indikator }}</td>
                    <td>{{ $bbt->bobot }}</td>
                    <td>
                      <div class="d-flex center-content-between">
                          <form action="{{ route('bobot.edit', $bbt->id) }}" class="d-inline">
                              @csrf
                              <button class="btn icon icon-left btn-warning"><i data-feather="alert-triangle"
                                      class="fas fa-edit"></i>
                              </button>
                          </form>
                          <form action="{{ route('bobot.destroy', $bbt->id) }}" method="POST"
                              class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button class="btn icon icon-left btn-danger" onclick="DestroyBobot(event)"><i data-feather="alert-circle"
                                      class="fas fa-trash-alt"></i>
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
</div>
<script type="text/javascript">
  //tanya hapus bobot
  function DestroyBobot(event) {
      event.preventDefault();

      hapus_bobot().then((confirmed) => {
          if (confirmed) {
              event.target.closest('form').submit();
          }
      });
  }

  function hapus_bobot() {
      return new Promise((resolve) => {
          Swal.fire({
              title: 'Apakah anda yakin menghapus bobot nilai ini..?',
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