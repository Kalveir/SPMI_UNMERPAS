@extends('.layout.main')

@section('title')
    SPMI | Berkas
@endsection

@section('container')
{{-- <style>
    .file-list {
        display: flex;
        /* flex-wrap: wrap; */
    }

    .file-item {
        flex: 0 0 200px; /* Ganti dengan lebar maksimum yang diinginkan */
        margin-right: 10px; /* Ganti sesuai kebutuhan */
    }

    thead th {
        text-align: left; /* atau text-align: center; atau text-align: right; */
    }
</style> --}}

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Berkas</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead class=text-left">
                    <tr>
                        <th>No</th>
                        <th>Program Studi</th>
                        <th>Indikator</th>
                        <th>Standard</th>
                        <th>Penetapan</th>
                        <th>Pelaksanaan</th>
                        <th>Evaluasi</th>
                        <th>Peningkatan</th>
                        <th>Pengendalian</th>
                        <th>Komentar</th>
                        <th>Nilai</th>
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
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{ substr($file_berkas->nama_file,0, 8)."_Penetapan." }}</a>
                                        <div class="text-wrap overflow-auto">
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
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{ substr($file_berkas->nama_file,0, 8)."_Pelaksanaan." }}</a>
                                        <div class="text-wrap overflow-auto">
                                            <strong>Deskripsi :</strong>
                                            {!! $file_berkas->deskripsi !!}
                                        </div>
                                    </div>
                                    
                                @endif
                            </div>
                            @endforeach
                        </td>
                        {{-- evaluasi --}}
                        <td>
                            @foreach ($brks->pengisian_berkas as $file_berkas)
                            <div class="file-item d-flex align-items-left" >
                                @if ($file_berkas->jenis == 'Evaluasi')
                                    <div class="col-auto" style="padding: 5px;">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{ substr($file_berkas->nama_file,0, 8)."_Evaluasi." }}</a>
                                        <div class="text-wrap overflow-auto">
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
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{ substr($file_berkas->nama_file,0, 8)."_Peningkatan." }}</a>
                                        <div class="white-space: nowrap; text-overflow: ellipsis;">
                                            <strong>Deskripsi :</strong>
                                            {!! $file_berkas->deskripsi !!}
                                        </div>
                                    </div>
                                    
                                @endif
                            </div>
                            @endforeach
                            
                        </td>
                        {{-- Pengendalian --}}
                        <td>
                            @foreach ($brks->pengisian_berkas as $file_berkas)
                            <div class="file-item d-flex align-items-left" >
                                @if ($file_berkas->jenis == 'Pengendalian')
                                    <div class="col-auto" style="padding: 5px;">
                                        <i class="fas fa-file"></i>
                                        <a href="{{ asset('storage/Berkas/' . $file_berkas->nama_file) }}" target="_blank" >{{ substr($file_berkas->nama_file,0, 8)."_Pengendalian." }}</a>
                                        <div class="text-wrap overflow-auto">
                                            <strong>Deskripsi :</strong>
                                            {!! $file_berkas->deskripsi !!}
                                        </div>
                                    </div>
                                    
                                @endif
                            </div>
                            @endforeach
                            
                        </td>
                        <td>{{ $brks->komentar }}</td>
                        <td>{{ $brks->nilai }}</td>
                        <td>
                            <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"></button>
                            <div class="dropdown-menu">
                                <form action="{{ route('berkas.addFile',$brks->id) }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i
                                        class="mdi mdi-file"></i>Upload Berkas</button>
                                </form>
                                <form action="{{ route('berkas.delete',$brks->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"><i
                                        class="fas fa-trash"></i>Hapus</button>
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
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- this page js -->
    <script src="/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection