@extends('layout.main')
@section('tittle')
SOP
@endsection

@section('judul')
Daftar SOP
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    @can('kelola bookdocs')
    <a href="{{ route('SOP.create') }}" class="btn btn-success mb-3">
        <span>Tambah SOP</span>
    </a>
    @endcan
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped">
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
            @foreach ($sop as $sp)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sp->nama }}</td>
                    <td>{{ $sp->standard->nama}}</td>
                    <td>{{ $sp->jenis}}</td>
                    <td>
                        <a href="{{ asset('storage/SOP/' . $sp->nama_file) }}" target="_blank">
                            <button class="btn btn-primary"><i class="fas fa-download"></i> Berkas</button>
                        </a>
                    </td>
                    @can('kelola bookdocs')
                    <td>
                        <div class="d-flex center-content-between">
                            <form action="{{ route('SOP.edit', $sp->id) }}"
                                class="d-inline">
                                @csrf
                                <button class="btn icon icon-left btn-warning"><i
                                        data-feather="alert-triangle" class="fas fa-edit"></i>
                                </button>
                            </form>
                            <form action="{{ route('SOP.destroy', $sp->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn icon icon-left btn-danger"><i
                                        data-feather="alert-circle" class="fas fa-trash-alt"></i>
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