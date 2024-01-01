@extends('layout.main')
@section('tittle')
Formulir
@endsection

@section('judul')
Daftar Formulir
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    @can('kelola bookdocs')
    <a href="{{ route('formulir.create') }}" class="btn btn-success mb-3">
        <span>Tambah Formulir</span>
    </a>
    @endcan
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Standard</th>
                <th>Jenis</th>
                <th>Berkas</th>
                @can('kelola bookdocs')
                <th>Aksi</th> 
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($formulir as $frm)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $frm->nama }}</td>
                    <td>{{ $frm->standard->nama}}</td>
                    <td>{{ $frm->jenis}}</td>
                    <td>
                        <a href="{{ asset('storage/Formulir/' . $frm->nama_file) }}" target="_blank">
                            <button class="btn btn-primary"><i class="mdi mdi-cloud-download"></i> Berkas</button>
                        </a>
                    </td>
                    @can('kelola bookdocs')
                    <td>
                        <div class="d-flex center-content-between">
                            <form action="{{ route('formulir.edit', $frm->id) }}"
                                class="d-inline">
                                @csrf
                                <button class="btn icon icon-left btn-warning"><i
                                        data-feather="alert-triangle"></i>
                                    Edit</button>
                            </form>
                            <form action="{{ route('formulir.destroy', $frm->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn icon icon-left btn-danger"><i
                                        data-feather="alert-circle"></i>
                                    Hapus
                                </button>
                            </form> 
                        </div>
                    </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection