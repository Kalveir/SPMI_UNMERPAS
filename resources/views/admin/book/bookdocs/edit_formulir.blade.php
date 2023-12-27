@extends('layout.main')

@section('title')
    Edit Formulir
@endsection

@section('container')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Formulir</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('formulir.update', $formulir->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT');
            <div class="col-md-6 row-md-15">
                <div class="form-group">
                    <label for="basicInput">Nama :</label>
                    <input type="text" class="form-control" id="basicInput" value="{{ $formulir->nama }}" name="nama" required>
                </div>
            </div>
            <div class="col-md-6 row-md-15">
                <div class="form-group">
                    <label for="basicInput">Jenis :</label>
                    <input type="text" class="form-control" id="basicInput" value="{{ $formulir->jenis }}" name="jenis" required>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                    <label for="basicInput">Standar :</label>
                    <select class="form-select" id="standar_id" name="standar_id">
                        @foreach ($standard as $std)
                            <option value="{{ $std->id }}"
                                {{ $formulir->standard_id == $std->id ? 'selected' : '' }}>
                                {{ $std->nama }}
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col-md-6 row-md-15">
                <div class="form-group">
                    <label for="basicInput">Upload Dokumen :</label>
                    <span>*opsional</span>
                    <input type="file" class="with-validation-filepond" data-max-file-size="50MB" name="nama_file">
                </div>
            </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    
</div>
@endsection