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
    <form action="{{ route('berkas.upload_file', $pengisian->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}

        <div class="form-group">
            <h4><strong>1. Indikator :</strong></h4>
        </div>
        <div class="col-md-15 mb-5">
            <h5>&emsp;{{$pengisian->indikator->indikator }}</h5>
        </div>
        <div class="form-group">
            <label for="basicInput"><h4><strong>2. Jenis</strong></h4></label>
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
            <label for="basicInput"><h4><strong>3. Upload Berkas :</strong></h4></label>
        </div>
        <div class="col-md-6 mb-4">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" required data-max-file-size="5MB" name="nama_file[]" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png" multiple>
                <label class="custom-file-label" for="customFile" placeholder="Upload"></label>
            </div>
            <ul id="fileList" class="list-group">
            <!-- File items will be added dynamically here -->
            </ul>
        </div>
        
        <div class="form-group">
            <label for="basicInput"><h4><strong>4. Deskripsi :</strong></h4></label>
        </div>
        <div class="col-md-8">
            <textarea class="summernote" name="deskripsi" class="form-control" required></textarea>
        </div>
        <br>
        <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>

@endsection