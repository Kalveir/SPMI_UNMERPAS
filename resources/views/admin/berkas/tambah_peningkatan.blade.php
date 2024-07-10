@extends('layout.main')
@section('tittle')
Pengisian Berkas
@endsection
@section('judul')
Upload Berkas
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <form action="{{ route('berkas.upload_peningkatan', $pengisian->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <h4><strong>1. Indikator :</strong></h4>
        </div>
        <div class="col-md-15 mb-5">
            <h5>&emsp;{{$pengisian->indikator->indikator }}</h5>
        </div>
        <div class="form-group">
            <label for="basicInput"><h4><strong>2. Upload Berkas :</strong></h4></label>
            <br>
        </div>
        <div class="col-md-6 mb-4">
            <input type="file"
           name="nama_file[]"
           multiple
           data-max-file-size="15MB"
           accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png, .rtf"
           required
           />
        </div>
        {{-- <div class="col-md-6 mb-4">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" required data-max-file-size="5MB" name="nama_file[]" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png" multiple>
                <label class="custom-file-label" for="customFile"></label>
            </div>
        </div> --}}

        <div class="form-group">
            <label for="basicInput"><h4><strong>3. Deskripsi :</strong></h4></label>
        </div>
        <div class="col-md-8">
            <textarea class="summernotet" name="deskripsi" class="form-control" required></textarea>
        </div>
        <br>
        <br>
            <button type="submit" id="submitButton" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        FilePond.registerPlugin(FilePondPluginFileValidateSize);
        // Get a file input reference
        const input = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        FilePond.create(input, {
            maxFileSize: '7MB', // Ukuran maksimum file
            labelIdle: 'Drag and drop files here or <span class="filepond--label-action"><u>Browse</u></span><br><br><small>Max file size: 7MB<small>',
            storeAsFile: true,
        });
    });
</script>
@endsection
