@extends('layout.main')
@section('tittle')
Pegawai
@endsection

@section('judul')
Daftar Pegawai
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <a href="{{ route('pegawai.create') }}" class="btn btn-success mb-3">
        <span>Tambah Pegawai</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $pgw)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pgw->nama }}</td>
                    <td>{{ $pgw->prodi->nama }}</td>
                        <td>
                            {{$pgw->roles->first()->name}}
                        </td>
                    <td>
                        @if ($pgw->status == 1)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex center-content-between"> 
                        <form action="{{ route('pegawai.edit', $pgw->id) }}"
                            class="d-inline">
                            @csrf
                            <button class="btn icon icon-left btn-warning"><i
                                    data-feather="alert-triangle" class="fas fa-edit"></i>
                            </button>
                        </form>
                        <form action="{{ route('pegawai.destroy', $pgw->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn icon icon-left btn-danger"><i
                                    data-feather="alert-circle" class="fas fa-trash"></i>
                            </button>
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
@endsection