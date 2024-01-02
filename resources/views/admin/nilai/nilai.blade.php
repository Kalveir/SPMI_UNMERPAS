@extends('layout.main')
@section('tittle')
Bobot Nilai
@endsection

@section('judul')
Daftar Bobot Nilai
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <a href="{{ route('nilai.create') }}" class="btn btn-success mb-3">
        <span>Tambah nilai</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No</th>
                <th>Indikator</th>
                <th>Deskripsi</th>
                <th>Nilai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $nli)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $nli->indikator->indikator }}</td>
                    <td>{!! $nli->deskripsi !!}</td>
                    <td>{{ $nli->nilai }}</td>
                    <td>
                        @if ($nli->status == 1)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('nilai.edit', $nli->id) }}"
                            class="d-inline">
                            @csrf
                            <button class="btn icon icon-left btn-warning"><i
                                    data-feather="alert-triangle" class="fas fa-edit"></i>
                            </button>
                        </form>
                        <form action="{{ route('nilai.destroy', $nli->id) }}" method="POST"
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