@extends('layout.main')
@section('tittle')
Pengisian Berkas
@endsection
@section('judul')
Upload Berkas
@endsection
@section('container')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('berkas.upload_peningkatan', $pengisian->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="basicInput"><h4><strong>1. Upload Berkas :</strong></h4></label>
        </div>
        <div class="col-md-6 mb-4">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" required data-max-file-size="5MB" name="nama_file[]" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png" multiple>
                <label class="custom-file-label" for="customFile"></label>
            </div>
        </div>
        <div class="form-group">
            <label for="basicInput"><h4><strong>2. Deskripsi :</strong></h4></label>
        </div>
        <div class="col-md-8">
            <br>
            <textarea class="summernote" name="deskripsi" class="form-control" required></textarea>
        </div>
        <br>
        <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection