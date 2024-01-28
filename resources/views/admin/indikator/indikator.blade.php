@extends('layout.main')
@section('tittle')
Indikator
@endsection

@section('judul')
Daftar Indikator
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    @can('kelola indikator')
    <a href="{{ route('indikator.create') }}" class="btn btn-success mb-3">
        <span>Tambah Indikator</span>
    </a>
    @endcan
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Startegi</th>
                <th>Isi</th>
                <th>Indikator</th>
                <th>Standard</th>
                <th>Satuan</th>
                <th>Target</th>
                <th>Status</th>
                @can('kelola indikator')
                <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($indikator as $idk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="ellipsis">{{$idk->strategi }}</td>
                    <td class="ellipsis">{{$idk->isi }}</td>
                    <td class="ellipsis">{{$idk->indikator }}</td>
                    <td class="ellipsis">{{ $idk->standard->nama}}</td>
                    <td class="ellipsis">{{$idk->satuan }}</td>
                    <td class="ellipsis">{{$idk->target }}</td>
                    <td>
                        @if ($idk->status == 1)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    @can('kelola indikator')
                    <td>
                        <div class="d-flex center-content-between">
                            <form action="{{ route('indikator.edit', $idk->id) }}"
                                class="d-inline">
                                @csrf
                                <button class="btn icon icon-left btn-warning"><i
                                        data-feather="alert-triangle" class="fas fa-edit"></i>
                                </button>
                            </form>
                            <form action="{{ route('indikator.destroy', $idk->id) }}" method="POST"
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