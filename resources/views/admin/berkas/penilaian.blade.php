@extends('layout.main')
@section('tittle')
Penilaian Berkas
@endsection

@section('judul')
Daftar Penilaian Berkas
@endsection

@section('container')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead class=text-left">
            <tr>
                <th>No</th>
                <th>Nama Kaprodi</th>
                <th>Program Studi</th>
                <th>Indikator</th>
                <th>Standard</th>
                <th>Penetapan</th>
                <th>Pelaksanaan</th>
                <th>Evaluasi</th>
                <th>Komentar</th>
                <th>Pengendalian</th>
                <th>Peningkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berkas as $brks)
                    @if ($brks->aksi_code != 0)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $brks->pegawai->nama }}</td>
                        <td>{{ $brks->prodi->nama }}</td>
                        <td>{{ $brks->indikator->indikator }}</td>
                        <td>{{ $brks->indikator->standard->nama }}</td>
                        {{-- penetapan --}}
                         <td>
                            @foreach ($brks->pengisian_berkas as $file_berkas)
                            <div class="file-item d-flex align-items-left" >
                                @if ($file_berkas->jenis == 'Penetapan')
                                    <div class="col-auto" style="padding: 5px;">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{$file_berkas->nama_file}}</a>
                                        <div class="text-wrap text-justify" style="max-width: 500px;">
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
                            <div class="file-item d-flex align-items-left" >
                                @if ($file_berkas->jenis == 'Pelaksanaan')
                                    <div class="col-auto" style="padding: 5px;">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{ $file_berkas->nama_file }}</a>
                                        <div class="text-wrap text-justify" style="max-width: 500px;">
                                            <strong>Deskripsi :</strong>
                                            {!! $file_berkas->deskripsi !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                        </td>
                        {{-- evaluasi --}}
                        <td>{{ $brks->nilai }}</td>
                        {{-- komentar --}}
                        <td>
                            <div class="text-wrap text-justify" style="max-width: 500px;">
                                {!! $brks->komentar !!}
                            </div>
                        </td>
                        {{-- Pengendalian --}}
                        <td>
                            @foreach ($brks->pengisian_berkas as $file_berkas)
                            <div class="file-item d-flex align-items-left" >
                                @if ($file_berkas->jenis == 'Pengendalian')
                                    <div class="col-auto" style="padding: 5px;">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{$file_berkas->nama_file}}</a>
                                        <div class="text-wrap text-justify" style="max-width: 500px;">
                                            <strong>Deskripsi :</strong>
                                            {!! $file_berkas->deskripsi !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                            
                        </td>
                        {{-- Peningkatan --}}
                        <td>
                            @foreach ($brks->pengisian_berkas as $file_berkas)
                            <div class="file-item d-flex align-items-left" >
                                @if ($file_berkas->jenis == 'Peningkatan')
                                    <div class="col-auto" style="padding: 5px;">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{$file_berkas->nama_file}}</a>
                                        <div class="text-wrap text-justify" style="max-width: 500px;">
                                            <strong>Deskripsi :</strong>
                                            {!! $file_berkas->deskripsi !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @endforeach
                            
                        </td>
                        <td>@if ($brks->aksi_code == 1)
                            <form action="{{ route('penilaian.addNilai', $brks->id) }}"
                                class="d-inline">
                                @csrf
                                <button class="btn icon icon-left btn-info"><i
                                        data-feather="alert-triangle"></i>
                                    Penilaian</button>
                            </form>
                            @elseif ($brks->aksi_code == 2)
                            <button class="btn btn-success">Penilaian Tersimpan</button>
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