@extends('layout.main')
@section('tittle')
Jabatan
@endsection

@section('judul')
Daftar Jabatan
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <a href="{{ route('jabatan.create') }}" class="btn btn-success mb-3">
        <span>Tambah Jabatan</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jabatan as $jbt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jbt->name }}</td>
                    <td>
                        <form action="{{ route('jabatan.edit', $jbt->id) }}"
                            class="d-inline">
                            @csrf
                            <button class="btn icon icon-left btn-warning"><i
                                    data-feather="alert-triangle" class="fas fa-edit"></i>
                            </button>
                        </form>
                        <form action="{{ route('jabatan.destroy', $jbt->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn icon icon-left btn-danger"><i
                                    data-feather="alert-circle" class="fas fa-trash-alt"></i>
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