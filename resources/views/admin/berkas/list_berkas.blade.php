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
    <div class="row table-responsive">
        <div class="col-auto">
          <table id="basic-datatables" class="table table-bordered table-striped" >
            <thead class="thead-dark">
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
                @foreach ($berkas as $bkst)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bkst->prodi->nama }}</td>
                        <td>{{ $bkst->indikator->indikator }}</td>
                        <td>{{ $bkst->indikator->standard->nama }}</td>
                        {{-- penetapan --}}
                         <td>
                            @foreach ($bkst->pengisian_berkas as $file_berkas)
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
                                    @if ($bkst->aksi_code == 0)
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
                            @foreach ($bkst->pengisian_berkas as $file_berkas)
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
                                    @if ($bkst->aksi_code == 0)
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


                        </td>
                        {{-- evaluasi --}}
                        <td>{{ optional($bkst->auditor)->nama }}</td>
                        <td>{{ optional($bkst->nilais)->nilai }}</td>
                        <td>
                            <div class="text-wrap text-justify" style="max-width: 500px;">
                                {!! $bkst->komentar !!}
                            </div>
                        </td>
                        {{-- Pengendalian --}}
                        <td>
                            @foreach ($bkst->pengisian_berkas as $file_berkas)
                            <div class="file-item d-flex align-items-left" >
                                @if ($file_berkas->jenis == 'Pengendalian')
                                    <div class="col-auto" style="padding: 5px;">
                                        <div class="text-wrap text-justify" style="max-width: 500px;">
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
                                    @if ($bkst->aksi_code == 3)
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
                        <td>
                            {{-- belum bisa di nilai --}}
                            @if ($bkst->aksi_code == 0)
                            <div class="d-flex center-content-between">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-warning dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="fas fa-edit"></i>
                                                <span>Edit</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{ route('berkas.addFile',$bkst->id) }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i
                                                class="fas fa-file-upload"></i><span> Upload Berkas</span></button>
                                        </form>
                                        <form action="{{ route('berkas.delete',$bkst->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit"><i
                                                class="fas fa-trash"></i>Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                @if ($bkst->pengisian_berkas->where('jenis', 'Penetapan')->isNotEmpty() && $bkst->pengisian_berkas->where('jenis', 'Pelaksanaan')->isNotEmpty())
                                    <form action="{{ route('berkas.valid', $bkst->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-outline-success">
                                            <i data-feather="alert-triangle" class="fas fa-check-square"></i>
                                            <span>Validasi</span>
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
                                <form action="{{ route('berkas.peningkatan',$bkst->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-primary">
                                        <span class="btn-label">
                                            <i class="fas fa-file-upload"></i>
                                        </span>
                                        Peningkatan
                                    </button>
                                </form>
                                @if ($bkst->pengisian_berkas->where('jenis', 'Peningkatan')->isNotEmpty())
                                    <form action="{{ route('berkas.submit', $bkst->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-outline-success">
                                            <i data-feather="alert-triangle" class="fas fa-check-square"></i>
                                            <span>Submit</span>
                                        </button>
                                    </form>
                                @endif
                            </div>
                            @elseif ($bkst->aksi_code == 4)
                                <div class="alert alert-info d-flex center-content-between" role="alert">
                                    <strong>AMI: {{$bkst->tanggal }}</strong>
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
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hiden="true" id="input_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Indikator</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-content">
                <!-- Form Input -->
                <form action="{{route('berkas.addIndikator')}}" method="post">
                    @csrf
                    <!-- tambahkan autcroll jika data-banyak -->
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