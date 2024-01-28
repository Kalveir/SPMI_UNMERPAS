@extends('layout.main')
@section('tittle')
Berkas
@endsection

@section('judul')
Daftar Berkas
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#input_modal">
        Tambah Indikator
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead class=thead-dark>
            <tr>
                <th>No</th>
                <th>Nama Kaprodi</th>
                <th>Program Studi</th>
                <th>Indikator</th>
                <th>Standard</th>
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
                    <td>{{ $brkp->prodi->nama }}</td>
                    <td>{{ $brkp->indikator->indikator }}</td>
                    <td>{{ $brkp->indikator->standard->nama }}</td>
                    {{-- penetapan --}}
                     <td>
                        @foreach ($brkp->pengisian_berkas as $file_berkas)
                        <div class="file-item d-flex align-items-left" >
                            @if ($file_berkas->jenis == 'Penetapan')
                                <div class="col-auto" style="padding: 5px;">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{$file_berkas->nama_file}}</a>
                                        <div class="text-wrap text-justify" style="max-width: 200px;">
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
                                        <div class="text-wrap text-justify" style="max-width: 200px;">
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
                    <td>{{ optional($brkp->auditor)->nama }}</td>
                    <td>{{ optional($brkp->nilais)->nilai }}</td>
                    <td>
                        <div class="text-wrap text-justify" style="max-width: 200px;">
                            {!! $brkp->komentar !!}
                        </div>
                    </td>
                    {{-- Pengendalian --}}
                    <td>
                        @foreach ($brkp->pengisian_berkas as $file_berkas)
                        <div class="file-item d-flex align-items-left" >
                            @if ($file_berkas->jenis == 'Pengendalian')
                                <div class="text-wrap text-left" style="max-width: 500px;">
                                    {!! $file_berkas->deskripsi !!}
                                </div>
                            @endif
                        </div>
                        @endforeach
                        
                    </td>
                    {{-- Peningkatan --}}
                    <td>
                        @foreach ($brkp->pengisian_berkas as $file_berkas)
                        <div class="file-item d-flex align-items-left" >
                            @if ($file_berkas->jenis == 'Peningkatan')
                                <div class="col-auto" style="padding: 5px;">
                                    <i class="fas fa-file"></i>
                                    <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{$file_berkas->nama_file}}</a>
                                    <div class="text-wrap text-justify" style="max-width: 200px;">
                                        <strong>Deskripsi :</strong>
                                        {!! $file_berkas->deskripsi !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                        @endforeach
                        
                    </td>
                    <td>
                        <form action="{{ route('pengendalian.edit',$brkp->id) }}"
                            class="d-inline">
                            @csrf
                            <button class="btn btn-outline-info"><i
                                    data-feather="alert-triangle" class="fas fa-check-square"></i>
                                    <span>Pengendalian</span>
                            </button>
                        </form>
                    </td>
                </tr>
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
                <h4 class="modal-title">Tambah Indikator</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form Input -->
                <form action="{{route('berkas.addIndikator')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Pilih Indikator : </label>
                        <select class="form-control" aria-label="Default select example" id="indikator_id" name="indikator_id" autofocus>
                            @foreach ($indikator as $indk)
                                <option value="{{ $indk->id }}">
                                    {{ $indk->indikator }}
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection