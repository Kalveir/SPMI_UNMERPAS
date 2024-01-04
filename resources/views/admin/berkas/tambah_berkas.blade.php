@extends('layout.main')
@section('tittle')
Pengisian Berkas
@endsection
@section('judul')
Upload Berkas
@endsection
@section('container')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('berkas.upload_file', $pengisian->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        <div class="form-group">
            <label for="basicInput">1. Jenis :</label>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset>
                <select class="form-control" id="jenis" name="jenis">
                        <option>Penetapan</option>
                        <option>Pelaksanaan</option>
                </select>
            </fieldset>
        </div>
        <div class="form-group">
            <label for="basicInput">2. Upload Berkas :</label>
        </div>
        <div class="col-md-6 mb-4">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" required data-max-file-size="5MB" name="nama_file[]" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png" multiple>
                <label class="custom-file-label" for="customFile"></label>
            </div>
        </div>
        <div class="form-group">
            <label for="basicInput">3. Deskripsi :</label>
        </div>
        <div class="col-md-8">
            <input id="deskripsi" type="hidden" name="deskripsi" required>
            <trix-editor input="deskripsi"></trix-editor>
        </div>
        <br>
        <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection