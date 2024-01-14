@extends('layout.main')
@section('tittle')
Audhitor
@endsection

@section('judul')
Daftar Audhitor
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <a href="{{ route('audhitor.create') }}" class="btn btn-success mb-3">
        <span>Tambah Audhitor</span>
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
                <th>Audhitor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai_audhitor as $audhitor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $audhitor['user']->nama }}</td> 
                    <td>{{ $audhitor['user']->prodi->nama }}</td>
                    <td>{{ $audhitor['jabatanRole'] }}</td>
                    <td>{{ $audhitor['audhitorRole'] }}</td>
                    <td> 
                      <form action="{{ route('audhitor.destroy', $audhitor['user']->id) }}" method="POST"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn icon icon-left btn-danger"><i
                                data-feather="alert-circle" class="fas fa-trash"></i>
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
@endsection