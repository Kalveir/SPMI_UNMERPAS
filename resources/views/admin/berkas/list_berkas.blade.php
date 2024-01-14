@extends('layout.main')
@section('tittle')
Pengisian Berkas
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
        <thead class=text-left">
            <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Indikator</th>
                <th>Standard</th>
                <th>Penetapan</th>
                <th>Pelaksanaan</th>
                <th>Auditor</th>
                <th>Evaluasi</th>
                <th>Komentar</th>
                <th>Pengendalian</th>
                <th>Peningkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berkas as $brks)
                <tr>
                    <td>{{ $loop->iteration }}</td>
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
                                @if ($brks->aksi_code == 0)
                                <div class="col-auto" style="padding: 5px;">
                                    <form action="{{ route('berkas.hapusFile',$file_berkas->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
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
                                @if ($brks->aksi_code == 0)
                                <div class="col-auto" style="padding: 5px;">
                                    <form action="{{ route('berkas.hapusFile',$file_berkas->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                @endif
                            @endif
                        </div>
                        @endforeach
                    </td>
                    {{-- evaluasi --}}
                    <td hidden>{{ $brks->pegawai->nama }}</td>
                    <td>{{ $brks->auditor->nama }}</td>
                    <td>{{ $brks->nilai }}</td>
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
                                <div class="col-auto" style="padding: 5px;">
                                    <form action="{{ route('berkas.hapusFile',$file_berkas->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
                                    <div class="text-wrap text-justify" style="max-width: 162px;">
                                        <strong>Deskripsi :</strong>
                                        {!! $file_berkas->deskripsi !!}
                                    </div>
                                </div>
                                <div class="col-auto" style="padding: 5px;">
                                    <form action="{{ route('berkas.hapusFile',$file_berkas->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        @endforeach
                        
                    </td>
                    <td>
                        {{-- belum bisa di nilai --}}
                        @if ($brks->aksi_code == 0)
                        <div class="d-flex center-content-between">

                            <form action="{{ route('berkas.valid',$brks->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                <button class="btn btn-success"><i
                                        data-feather="alert-triangle" class="fas fa-check-square"></i>
                                        <span>Validasi</span>
                                </button>
                            </form>
                            <div class="dropdown">
                                <button type="button" class="btn btn-warning dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="fas fa-edit"></i>
                                            <span>Edit</span>
                                </button>
                                <div class="dropdown-menu">
                                    <form action="{{ route('berkas.addFile',$brks->id) }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item" type="submit"><i
                                            class="fas fa-file-upload"></i><span> Upload Berkas</span></button>
                                    </form>
                                    <form action="{{ route('berkas.delete',$brks->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit"><i
                                            class="fas fa-trash"></i>Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- fix di nilai --}}
                        @elseif ($brks->aksi_code == 1)
                        <button class="btn btn-danger">Proses Penilaian</button>
                        @elseif ($brks->aksi_code == 2)
                        <button class="btn btn-info">Penilaian Selesai</button>
                        @endif
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