@extends('layout.main')
@section('tittle')
Buku Manual
@endsection

@section('judul')
Daftar Buku Manual
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    @can('kelola bookmanual')
    <a href="{{ route('bookmanual.create') }}" class="btn btn-success mb-3">
        <span>Tambah Buku Manual</span>
    </a>
    @endcan
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Standard</th>
                <th>Jenis</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookmanual as $bkm)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bkm->standard->nama}}</td>
                    <td>{{ $bkm->jenis }}</td>
                    <td>
                        @if ($bkm->status == 1)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex center-content-between">
                            @can('kelola bookmanual')
                            <form action="{{ route('bookmanual.edit', $bkm->id) }}" method="GET" class="mb-2">
                                @csrf
                                <button class="btn icon icon-left btn-warning"><i data-feather="alert-triangle" class="fas fa-edit"></i></button>
                            </form>
                            @endcan
                            <form action="{{ route('bookmanual.show', $bkm->id) }}" method="GET" class="mb-2">
                                @csrf
                                <button class="btn icon icon-left btn-info"><i data-feather="alert-triangle" class="fas fa-eye"></i></button>
                            </form>
                            @can('kelola bookmanual')
                            <form action="{{ route('bookmanual.destroy', $bkm->id) }}" method="POST" class="mb-2">
                                @csrf
                                @method('DELETE')
                                <button class="btn icon icon-left btn-danger"><i data-feather="alert-circle" class="fas fa-trash-alt"></i></button>
                            </form>
                            @endcan
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