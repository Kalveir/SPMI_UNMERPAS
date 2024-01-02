@extends('layout.main')
@section('tittle')
Buku Standard
@endsection

@section('judul')
Daftar Buku Standard
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <a href="{{ route('bookstandard.create') }}" class="btn btn-success mb-3">
        <span>Tambah Buku Standard</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No</th>
                <th>Standard</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookstandar as $bst)
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $bst->standard->nama }}</td>
                    <td>
                        @if ($bst->status == 1)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex center-content-between">
                            <form action="{{ route('bookstandard.edit', $bst->id) }}"
                                class="d-inline">
                                @csrf
                                <button class="btn icon icon-left btn-warning"><i
                                        data-feather="alert-triangle" class="fas fa-edit"></i>
                                </button>
                            </form>
                            <form action="{{ route('bookstandard.destroy', $bst->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn icon icon-left btn-danger"><i
                                        data-feather="alert-circle" class="fas fa-trash-alt"></i>
                                
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