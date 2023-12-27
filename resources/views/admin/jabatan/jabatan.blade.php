@extends('layout.main')

@section('title')
    SPMI | Jabatan
@endsection

@section('container')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Jabatan</h5>
        <a href="{{ route('jabatan.create') }}" class="btn btn-success mb-3">
            <span>Tambah Jabatan</span>
        </a>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
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
                                            data-feather="alert-triangle"></i>
                                        Edit</button>
                                </form>
                                <form action="{{ route('jabatan.destroy', $jbt->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn icon icon-left btn-danger"><i
                                            data-feather="alert-circle"></i>
                                        Hapus
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
 {{-- modal  input Jabatan --}}
 
{{-- modal --}}

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- this page js -->
    <script src="/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection