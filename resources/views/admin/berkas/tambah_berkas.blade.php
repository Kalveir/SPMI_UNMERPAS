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
        <h4><strong>Indikator :</strong></h4>
        <h5>{{$pengisian->indikator->indikator }}</h5>
    </div>
  <div class="card-body">
    <form action="{{ route('berkas.upload_file', $pengisian->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Formulir Penetapan -->
            <div class="col-md-6">
              <h4><strong>1. Penetapan</strong></h4>
              <div class="form-group">
                <label><h4><strong>Upload Berkas :</strong></h4></label>
                <br>
                <input type="file"
                   name="file_penetapan[]"
                   multiple
                   accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png, .rtf"
                   />
               </div>
               <div class="form-group">
                    <label for="basicInput"><h4><strong>Deskripsi :</strong></h4></label>
                    <textarea class="summernote" name="deskripsi" class="form-control" required></textarea>
               </div>
            </div>
            <!-- Formulir Pelaksanaan -->
            <div class="col-md-6">
                <h4><strong>2. Pelaksanaan</strong></h4>
                <div class="form-group">
                  <label><h4><strong>Upload Berkas :</strong></h4></label>
                  <br>
                  <input type="file"
                     name="file_pelaksanaan[]"
                     multiple
                     accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png, .rtf"
                     />
                 </div>
                 <div class="form-group">
                      <label for="basicInput"><h4><strong>Deskripsi :</strong></h4></label>
                      <textarea class="summernote" name="deskripsi" class="form-control" required></textarea>
                 </div>
            </div>
          </div>
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
