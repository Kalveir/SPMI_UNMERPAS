@extends('layout.main')
@section('tittle')
    Penilaian Berkas
@endsection

@section('judul')
    Audit Mutu Program Studi {{ $prodi->nama }}
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
            <i class="fas fa-eye-slash"></i>Auditor</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="7">
            <i class="fas fa-eye-slash"></i>Evaluasi</button>
            <button class="btn btn-outline-secondary btn-sm toggle-col" data-column="8">
            <i class="fas fa-eye-slash"></i>Komentar</button>
        </div>
            <div class="table-responsive">
                <table id="contoh-datatables" class="table table-bordered table-striped">
                    <thead class="text-left thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kaprodi</th>
                            {{-- <th>Program Studi</th> --}}
                            <th>Standar</th>
                            <th>Indikator</th>
                            <th>Penetapan</th>
                            <th>Pelaksanaan</th>
                            <th>Auditor</th>
                            <th>Evaluasi</th>
                            <th>Komentar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berkas_nilai as $brks)
                            @if ($brks->aksi_code != 0)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brks->pegawai->nama }}</td>
                                    {{-- <td>{{ $brks->prodi->nama }}</td> --}}
                                    <td>
                                        <div style="width: 200px;">
                                            {{ $brks->indikator->standard->nama }}
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 200px;">
                                            {{ $brks->indikator->indikator }}
                                        </div>
                                    </td>
                                    {{-- penetapan --}}
                                    <td>
                                        @foreach ($brks->pengisian_berkas as $file_berkas)
                                            <div class="file-item d-flex align-items-left">
                                                @if ($file_berkas->jenis == 'Penetapan')
                                                    <div class="col-auto" style="padding: 5px;">
                                                        <i class="fas fa-file"></i>
                                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}"
                                                            target="_blank">{{ $file_berkas->nama_asli }}</a>
                                                        <div class="text-wrap text-justify" style="width: 300px;">
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
                                        @foreach ($brks->pengisian_berkas as $file_berkas)
                                            <div class="file-item d-flex align-items-left">
                                                @if ($file_berkas->jenis == 'Pelaksanaan')
                                                    <div class="col-auto" style="padding: 5px;">
                                                        <i class="fas fa-file"></i>
                                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}"
                                                            target="_blank">{{ $file_berkas->nama_asli }}</a>
                                                        <div class="text-wrap text-justify" style="width: 300px;">
                                                            <strong>Deskripsi :</strong>
                                                            {!! $file_berkas->deskripsi !!}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div style="width: 200px;">
                                            {{ optional($brks->auditor)->nama }}
                                        </div>
                                    </td>
                                    {{-- evaluasi --}}
                                    <td>{{ $brks->nilai }}</td>
                                    {{-- komentar --}}
                                    <td>
                                        <div style="width: 200px;">
                                            {!! $brks->komentar !!}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex center-content-between">
                                            @if ($brks->aksi_code == 1)
                                                <form action="{{ route('penilaian.addNilai', encrypt($brks->id)) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-outline-warning">
                                                        <span class="btn-label">
                                                            <i class="fas fa-pen-square"></i>
                                                        </span>
                                                        Proses Audit
                                                    </button>
                                                </form>
                                                @if ($brks->nilai != null)
                                                <form action="{{ route('penilaian.validasi', encrypt($brks->id)) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        <button class="btn btn-outline-danger" onclick="lockNilai(event)">
                                                            <i data-feather="alert-triangle" class="fas fa-lock"></i>
                                                            <span>Kunci Penilaian</span>
                                                        </button>
                                                    </form>
                                                @endif
                                        </div>
                                    @elseif ($brks->aksi_code > 1)
                                        <div class="alert alert-primary" role="alert">
                                            <i class="fas fa-info-circle"></i>
                                            <strong>Penilaian Tersimpan!</strong>
                                        </div>
                            @endif
                            </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script type="text/javascript">
    //tanya kunci
    function lockNilai(event) {
        event.preventDefault();

        submit_penilaian().then((confirmed) => {
            if (confirmed) {
                event.target.closest('form').submit();
            }
        });
    }

    function submit_penilaian() {
        return new Promise((resolve) => {
            Swal.fire({
                title: 'Apakah anda yakin menyimpan penilaian evaluasi ini..?',
                text: 'Data Penilaian disimpan permanen!',
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
