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
        <div class="col-md-6 mb-4">
            <fieldset>
                <label for="basicInput">1. Jenis :</label>
                <select class="form-control" id="jenis" name="jenis">
                        <option>Penetapan</option>
                        <option>Pelaksanaan</option>
                </select>
            </fieldset>
        </div>
        <div class="col-md-6 mb-4">
            <h5>2. Upload Berkas</h4>
            <div class="col-md-15row-md-15">
                <div class="form-group">
                    <input type="file" class="form-controll" id="formFile" required data-max-file-size="5MB" name="nama_file[]" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png" multiple>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput">3. Deskripsi :</label>
                <input id="deskripsi" type="hidden" name="deskripsi" required>
                <trix-editor input="deskripsi"></trix-editor>
            </div>
        </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection