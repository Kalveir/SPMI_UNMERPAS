@extends('layout.main')
@section('tittle')
    Penilaian Berkas
@endsection

@section('judul')
    Audit Mutu Program Studi {{ $prodi }}
@endsection

@section('container')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="table table-bordered table-striped">
                    <thead class="text-left thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kaprodi</th>
                            <th>Program Studi</th>
                            <th>Indikator</th>
                            <th>Standard</th>
                            <th>Penetapan</th>
                            <th>Pelaksanaan</th>
                            <th>Audhitor</th>
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
                                    <td>{{ $brks->prodi->nama }}</td>
                                    <td>
                                        <div style="width: 200px;">
                                            {{ $brks->indikator->indikator }}
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width: 200px;">
                                            {{ $brks->indikator->standard->nama }}
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
                                                            target="_blank">{{ $file_berkas->nama_file }}</a>
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
                                                            target="_blank">{{ $file_berkas->nama_file }}</a>
                                                        <div class="text-wrap text-justify" style="width: 300px;">
                                                            <strong>Deskripsi :</strong>
                                                            {!! $file_berkas->deskripsi !!}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>{{ optional($brks->auditor)->nama }}</td>
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
                                                <form action="{{ route('penilaian.addNilai', $brks->id) }}"
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
                                                    <form action="{{ route('penilaian.validasi', $brks->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        <button class="btn btn-outline-danger">
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
@endsection
