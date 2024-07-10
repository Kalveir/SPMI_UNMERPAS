@extends('layout.main')
@section('tittle')
    Pengisian Berkas
@endsection

@section('judul')
    Daftar Berkas
@endsection

@section('container')
    <style>
      .toggle-col {
        cursor: pointer;
      }
    </style>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-outline-success mb-3" data-toggle="modal" data-target="#input_modal">
                <i class="fas fa-plus"></i><span> Tambah Standar</span>
            </button>
        </div>
        <div class="card-body">
        <div class="mb-3">
            <label for="basicInput"><p>Kolom : </p></label><br>
            <button class="btn btn-outline-primary btn-sm toggle-col" data-column="1">
            <i class="fas fa-eye-slash"></i>Standar</button>
            <button class="btn btn-outline-primary btn-sm toggle-col" data-column="2">
            <i class="fas fa-eye-slash"></i>Indikator</button>
            <button class="btn btn-outline-primary btn-sm toggle-col" data-column="3">
            <i class="fas fa-eye-slash"></i>Penetapan</button>
            <button class="btn btn-outline-primary btn-sm toggle-col" data-column="4">
            <i class="fas fa-eye-slash"></i>Pelaksanaan</button>
            <button class="btn btn-outline-primary btn-sm toggle-col" data-column="5">
            <i class="fas fa-eye-slash"></i>Tahun</button>
            <button class="btn btn-outline-primary btn-sm toggle-col" data-column="6">
            <i class="fas fa-eye-slash"></i>Auditor</button>
            <button class="btn btn-outline-primary btn-sm toggle-col" data-column="7">
            <i class="fas fa-eye-slash"></i>Evaluasi</button>
            <button class="btn btn-outline-primary btn-sm toggle-col" data-column="8">
            <i class="fas fa-eye-slash"></i>Komentar</button>
            <button class="btn btn-outline-primary btn-sm toggle-col" data-column="9">
            <i class="fas fa-eye-slash"></i>Pengendalian</button>
            <button class="btn btn-outline-primary btn-sm toggle-col" data-column="10">
            <i class="fas fa-eye-slash"></i>Peningkatan</button>
        </div>
            <div class="row table-responsive">
                <table id="contoh-datatables" class="cell-border table table-bordered table-striped" style="width=100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <!-- <th>Program Studi</th> -->
                            <th>Standar</th>
                            <th>Indikator</th>
                            <th>Penetapan</th>
                            <th>Pelaksanaan</th>
                            <th>Tahun</th>
                            <th>Auditor</th>
                            <th>Evaluasi</th>
                            <th>Komentar</th>
                            <th>Pengendalian</th>
                            <th>Peningkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berkas as $bkst)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <!-- <td>{{ $bkst->prodi->nama }}</td> -->
                                <td>
                                    <div style="width: 150px;">
                                        {{ $bkst->indikator->standard->nama }}
                                    </div>
                                </td>
                                <td>
                                    <div style="width: 200px;">
                                        {{ $bkst->indikator->indikator }}
                                    </div>
                                </td>
                                {{-- penetapan --}}
                                <td class="text-wrap">
                                    @foreach ($bkst->pengisian_berkas as $file_berkas)
                                        <div class="file-item d-flex align-items-left">
                                            @if ($file_berkas->jenis == 'Penetapan')
                                                <div class="col-auto" style="padding: 5px;">
                                                    <i class="fas fa-file"></i>
                                                    <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}"
                                                        target="_blank">{{ $file_berkas->nama_file }}</a>
                                                    <div style="width: 300px;">
                                                        <strong>Deskripsi :</strong>
                                                        {!! $file_berkas->deskripsi !!}
                                                    </div>
                                                </div>
                                                @if ($bkst->aksi_code == 0)
                                                    <div class="col-auto" style="padding: 5px;">
                                                        <form action="{{ route('berkas.hapusFile', $file_berkas->id) }}"
                                                            class="d-inline" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="destroyBerkas(event)">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach

                                </td>
                                {{-- pelaksanaan --}}
                                <td>
                                    @foreach ($bkst->pengisian_berkas as $file_berkas)
                                        <div class="file-item d-flex align-items-left">
                                            @if ($file_berkas->jenis == 'Pelaksanaan')
                                                <div class="col-auto" style="padding: 5px;">
                                                    <i class="fas fa-file"></i>
                                                    <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}"
                                                        target="_blank">{{ $file_berkas->nama_file }}</a>
                                                    <div style="width: 300px;">
                                                        <strong>Deskripsi :</strong>
                                                        {!! $file_berkas->deskripsi !!}
                                                    </div>
                                                </div>
                                                @if ($bkst->aksi_code == 0)
                                                    <div class="col-auto" style="padding: 5px;">
                                                        <form action="{{ route('berkas.hapusFile', $file_berkas->id) }}"
                                                            class="d-inline" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="destroyBerkas(event)">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach

                                </td>

                                <td>{{ $bkst->tahun }}</td>
                                </td>
                                {{-- evaluasi --}}
                                <td>
                                    @if ($bkst->aksi_code > 1)
                                        <div style="width: 200px;">
                                            {{ optional($bkst->auditor)->nama }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($bkst->aksi_code > 1)
                                        {{ $bkst->nilai }}
                                    @endif
                                </td>
                                <td>
                                    @if ($bkst->aksi_code > 1)
                                        <div style="width: 200px;">
                                            {!! $bkst->komentar !!}
                                        </div>
                                    @endif
                                </td>
                                {{-- Pengendalian --}}
                                <td>
                                    @foreach ($bkst->pengisian_berkas as $file_berkas)
                                        <div class="file-item d-flex align-items-left">
                                            @if ($file_berkas->jenis == 'Pengendalian')
                                                <div class="col-auto" style="padding: 5px;">
                                                    <div style="width: 300px;">
                                                        {!! $file_berkas->deskripsi !!}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </td>
                                {{-- Peningkatan --}}
                                <td>
                                    @foreach ($bkst->pengisian_berkas as $file_berkas)
                                        <div class="file-item d-flex align-items-left">
                                            @if ($file_berkas->jenis == 'Peningkatan')
                                                <div class="col-auto" style="padding: 5px;">
                                                    <i class="fas fa-file"></i>
                                                    <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}"
                                                        target="_blank">{{ $file_berkas->nama_file }}</a>
                                                    <div style="width: 300px;">
                                                        <strong>Deskripsi :</strong>
                                                        {!! $file_berkas->deskripsi !!}
                                                    </div>
                                                </div>
                                                @if ($bkst->aksi_code == 3)
                                                    <div class="col-auto" style="padding: 5px;">
                                                        <form action="{{ route('berkas.hapusFile', $file_berkas->id) }}"
                                                            class="d-inline" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"onclick="destroyBerkas(event)">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach

                                </td>
                                <td>
                                    {{-- belum bisa di nilai --}}
                                    @if ($bkst->aksi_code == 0)
                                        <div class="d-flex center-content-between">
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-outline-warning dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                        class="fas fa-edit"></i>
                                                    <span>Edit</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <form action="{{ route('berkas.addFile', $bkst->id) }}" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit"><i
                                                                class="fas fa-file-upload"></i><span> Upload
                                                                Berkas</span></button>
                                                    </form>
                                                    <form action="{{ route('berkas.delete', $bkst->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" onclick="destroyIndikator(event)" type="submit"><i
                                                                class="fas fa-trash"></i>Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                            @if (
                                                $bkst->pengisian_berkas->where('jenis', 'Penetapan')->isNotEmpty() &&
                                                    $bkst->pengisian_berkas->where('jenis', 'Pelaksanaan')->isNotEmpty())
                                                <form action="{{ route('berkas.valid', $bkst->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-outline-success" onclick="validateBerkas(event)">
                                                        <i data-feather="alert-triangle" class="fas fa-check-square"></i>
                                                        <span>Submit</span>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    @elseif ($bkst->aksi_code == 1)
                                        <div class="alert alert-warning" role="alert">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            <strong>Proses Penilaian</strong>
                                        </div>
                                        {{-- sudah dinilai --}}
                                    @elseif ($bkst->aksi_code == 2)
                                        <div class="alert alert-success" role="alert">
                                            <i class="fa fa-check mr-1"></i>
                                            <strong>Penilaian Selesai</strong>
                                        </div>
                                        {{-- upload peningkatan --}}
                                    @elseif ($bkst->aksi_code == 3)
                                        <div class="d-flex center-content-between">
                                            <form action="{{ route('berkas.peningkatan', $bkst->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-outline-primary">
                                                    <span class="btn-label">
                                                        <i class="fas fa-file-upload"></i>
                                                    </span>
                                                    Peningkatan
                                                </button>
                                            </form>
                                            @if ($bkst->pengisian_berkas->where('jenis', 'Peningkatan')->isNotEmpty())
                                                <form action="{{ route('berkas.submit', $bkst->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-outline-success" onclick="validatePeningkatan(event)">
                                                        <i data-feather="alert-triangle" class="fas fa-check-square"></i>
                                                        <span>Submit</span>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    @elseif ($bkst->aksi_code == 4)
                                        <div class="alert alert-info d-flex center-content-between" role="alert">
                                            <strong>AMI: {{ $bkst->tanggal }}</strong>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-hiden="true" id="input_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Standar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Body Modal -->
                <div class="modal-content">
                    <!-- Form Input -->
                    <form action="{{ route('berkas.addIndikator') }}" method="post">
                        @csrf
                        <!-- tambahkan autcroll jika data-banyak -->
                        <div class="form-group">
                            <label for="nama">Pilih Standar : </label>
                            <select class="form-control" aria-label="Default select example" id="indikator_id"
                                name="standar_id" style="max-height:50px; overflow-y: auto;">
                                @foreach ($standar as $std)
                                    <option value="{{ $std->id }}">
                                        {{ $std->nama }}
                                    </option>
                                @endforeach
                            </select>
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
    <script type="text/javascript">
        //tanya validasi berkas
        function validateBerkas(event) {
            event.preventDefault();

            submit_berkas().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function submit_berkas() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin submit data ini..?',
                    text: 'Data akan disimpan permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Submit!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        resolve(true); // Mengirimkan nilai true jika pengguna menekan tombol "Ya, Hapus!"
                    } else {
                        resolve(false); // Mengirimkan nilai false jika pengguna menekan tombol pembatal
                    }
                });
            });
        }
        //tanya hapus indikator
        function destroyIndikator(event) {
            event.preventDefault();

            hapus_indikator().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function hapus_indikator() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus indikator ini..?',
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
        //tanya berkas
        function destroyBerkas(event) {
            event.preventDefault();

            destroy_berkas().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function destroy_berkas() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menghapus berkas ini..?',
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
        //tanya validasi peningkatan
        function validatePeningkatan(event) {
            event.preventDefault();

            simpan_peningkatan().then((confirmed) => {
                if (confirmed) {
                    event.target.closest('form').submit();
                }
            });
        }

        function simpan_peningkatan() {
            return new Promise((resolve) => {
                Swal.fire({
                    title: 'Apakah anda yakin menyimpan peningkatan ini..?',
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
