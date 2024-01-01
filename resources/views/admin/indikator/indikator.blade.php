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
    <a href="{{ route('indikator.create') }}" class="btn btn-success mb-3">
        <span>Tambah Indikator</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No</th>
                <th>Startegi</th>
                <th>Isi</th>
                <th>Indikator</th>
                <th>Standard</th>
                <th>Satuan</th>
                <th>Target</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($indikator as $idk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$idk->strategi }}</td>
                    <td>{{$idk->isi }}</td>
                    <td>{{$idk->indikator }}</td>
                    <td>{{ $idk->standard->nama}}</td>
                    <td>{{$idk->satuan }}</td>
                    <td>{{$idk->target }}</td>
                    <td>
                        @if ($idk->status == 1)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex center-content-between">
                            <form action="{{ route('indikator.edit', $idk->id) }}"
                                class="d-inline">
                                @csrf
                                <button class="btn icon icon-left btn-warning"><i
                                        data-feather="alert-triangle"></i>
                                    Edit</button>
                            </form>
                            <form action="{{ route('indikator.destroy', $idk->id) }}" method="POST"
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
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection