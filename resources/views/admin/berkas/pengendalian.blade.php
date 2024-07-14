@extends('layout.main')
@section('tittle')
SPMI | Pengendalian
@endsection

@section('judul')
Daftar Pengendalian Prodi {{ $prodi->nama }}
@endsection

@section('container')
<div class="card">
  {{-- <div class="card-header">
  </div> --}}
  <div class="card-body">
        <div class="mb-3">
            <label for="basicInput"><p>Visibility Column :</p></label><br>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="1">
            <i class="fas fa-eye-slash"></i>Nama Kaprodi</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="2">
            <i class="fas fa-eye-slash"></i>Standar</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="3">
            <i class="fas fa-eye-slash"></i>Indikator</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="4">
            <i class="fas fa-eye-slash"></i>Penetapan</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="5">
            <i class="fas fa-eye-slash"></i>Pelaksanaan</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="6">
            <i class="fas fa-eye-slash"></i>Tahun</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="7">
            <i class="fas fa-eye-slash"></i>Auditor</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="8">
            <i class="fas fa-eye-slash"></i>Evaluasi</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="9">
            <i class="fas fa-eye-slash"></i>Komentar</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="10">
            <i class="fas fa-eye-slash"></i>Pengendalian</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="11">
            <i class="fas fa-eye-slash"></i>Peningkatan</button>
        </div>
    <div class="table-responsive">
      <table id="contoh-datatables" class="table table-bordered table-striped" >
        <thead class=thead-dark>
            <tr>
                <th>No</th>
                <th>Nama Kaprodi</th>
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
            @foreach ($berkas_prodi as $brkp)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $brkp->pegawai->nama }}</td>
                    {{-- <td>{{ $brkp->prodi->nama }}</td> --}}
                    <td>
                        <div style="width: 200px;">
                            {{ $brkp->indikator->standard->nama }}
                        </div>
                    </td>
                    <td>
                        <div style="width: 200px;">
                            {{ $brkp->indikator->indikator }}
                        </div>
                    </td>
                    {{-- penetapan --}}
                     <td>
                        @foreach ($brkp->pengisian_berkas as $file_berkas)
                        <div class="file-item d-flex align-items-left" >
                            @if ($file_berkas->jenis == 'Penetapan')
                                <div class="col-auto">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{$file_berkas->nama_file}}</a>
                                        <div style="width: 300px;">
                                            <strong>Deskripsi :</strong>
                                            {!! $file_berkas->deskripsi !!}
                                        </div>
                                </div>
                            @endif
                        </div>
                        @endforeach

                    </td>
                    {{-- pelaksanaan --}}
                    <td>
                        @foreach ($brkp->pengisian_berkas as $file_berkas)
                        <div class="file-item d-flex align-items-left" >
                            @if ($file_berkas->jenis == 'Pelaksanaan')
                                <div class="col-auto" style="padding: 5px;">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{$file_berkas->nama_file}}</a>
                                        <div style="width: 300px;">
                                            <strong>Deskripsi :</strong>
                                            {!! $file_berkas->deskripsi !!}
                                        </div>
                                    </div>
                            @endif
                        </div>
                        @endforeach
                    </td>
                    <td>{{ $brkp->tahun }}</td>
                    {{-- evaluasi --}}
                    <td>
                        <div style="width: 200px;">
                            {{ optional($brkp->auditor)->nama }}
                        </div>
                    </td>
                    <td>{{ $brkp->nilai }}</td>
                    <td>
                        <div class="text-wrap text-justify" style="width: 200px;">
                            {!! $brkp->komentar !!}
                        </div>
                    </td>
                    {{-- Pengendalian --}}
                    <td>
                        @foreach ($brkp->pengisian_berkas as $file_berkas)
                        <div class="file-item d-flex align-items-left" >
                            @if ($file_berkas->jenis == 'Pengendalian')
                                <div class="text-wrap text-left" style="width: 300px;">
                                    {!! $file_berkas->deskripsi !!}
                                </div>
                            @endif
                        </div>
                        @endforeach

                    </td>
                    {{-- Peningkatan --}}
                    <td>
                        @if($brkp->aksi_code == 4)
                            @foreach ($brkp->pengisian_berkas as $file_berkas)
                            <div class="file-item d-flex align-items-left" >
                                @if ($file_berkas->jenis == 'Peningkatan')
                                    <div class="col-auto" style="padding: 5px;">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{$file_berkas->nama_file}}</a>
                                        <div class="text-wrap text-justify" style="width: 300px;">
                                            <strong>Deskripsi :</strong>
                                            {!! $file_berkas->deskripsi !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        @endif


                    </td>
                    <td>
                        @if ($brkp->aksi_code == 2)
                        <div class="d-flex center-content-between">
                        <form action="{{ route('pengendalian.edit',$brkp->id) }}"
                            class="d-inline">
                            @csrf
                            <button class="btn btn-outline-info"><i
                                    data-feather="alert-triangle" class="fas fa-check-square"></i>
                                    <span>Pengendalian</span>
                            </button>
                        </form>
                            @if ($brkp->pengisian_berkas->where('jenis', 'Pengendalian')->isNotEmpty())
                                <form action="{{ route('pengendalian.validasi', $brkp->id) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-outline-success" onclick="lockPengendalian(event)">
                                        <i data-feather="alert-triangle" class="fas fa-save"></i>
                                        <span>Simpan Pengendalian</span>
                                    </button>
                                </form>
                            @endif
                        @elseif($brkp->aksi_code == 3)
                            <div class="alert alert-primary" role="alert">
                                <i class="fas fa-info-circle"></i>
                                <strong>Pengendalian Tersimpan!</strong>
                            </div>
                        @elseif($brkp->aksi_code == 4)
                            <div class="alert alert-info d-flex center-content-between" role="alert">
                                <strong>AMI: {{ $brkp->tanggal }}</strong>
                            </div>
                        @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<script type="text/javascript">
    //tanya kunci
    function lockPengendalian(event) {
        event.preventDefault();

        submit_pengendalian().then((confirmed) => {
            if (confirmed) {
                event.target.closest('form').submit();
            }
        });
    }

    function submit_pengendalian() {
        return new Promise((resolve) => {
            Swal.fire({
                title: 'Apakah anda yakin menyimpan pengendalian ini..?',
                text: 'Data Pengendalian disimpan permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!'
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
