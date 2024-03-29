@extends('layout.main')
@section('tittle')
Jabatan
@endsection
@section('judul')
Edit Jabatan
@endsection
@section('container')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('jabatan.update', $jabatan->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama">Nama Jabatan:</label>
                <input type="text" value="{{ $jabatan->name }}" name="nama" id="nama" class="form-control"
                    placeholder="Masukkan Nama Jabatan" required="required" autofocus>
            </div>
            <div class="form-group">
                <label for="nama">Hak Akses:</label>
                <select class="form-select" id="multiple-select-field" data-placeholder="Pilih Akses" multiple name="akses[]">
                    @foreach ($permission as $prs)
                        <option value="{{ $prs->name }}" {{ $jabatan->hasPermissionTo($prs) ? 'selected' : '' }}>{{ $prs->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script>
    $( '#multiple-select-field' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
} );
</script>
@endsection