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
    <form action="{{ route('berkas.upload_file', $pengisian->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        <div class="col-md-8 mb-4">
           <div class="form-group">
                <h4><strong>1. Indikator :</strong></h4>
                <h5>{{$pengisian->indikator->indikator }}</h5>
            </div>
            <div class="form-group">
                <label for="basicInput"><h4><strong>2. Jenis</strong></h4></label>
                <select class="form-control col-md-8" id="jenis" name="jenis" required>
                    <option value="" selected disabled>--Pilih Jenis--</option>
                    <option>Penetapan</option>
                    <option>Pelaksanaan</option>
                </select>
            </div>
            <div class="form-group">
                <label><h4><strong>3. Upload Berkas :</strong></h4></label>
                <br>
                <input type="file"
                   name="nama_file[]"
                   multiple
                   data-max-file-size="15MB"
                   accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png, .rtf"
                   required
                   />
            </div>
            <div class="form-group">
                <label for="basicInput"><h4><strong>4. Deskripsi :</strong></h4></label>
                <textarea class="summernote" name="deskripsi" class="form-control" required></textarea>
            </div>
        </div>
        <br>
        <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
            maxFileSize: '15MB', // Ukuran maksimum file
            labelIdle: 'Drag and drop files here or <span class="filepond--label-action"><u>Browse</u></span><br><br><small>Max file size: 15MB<small>',
            storeAsFile: true,
        });
    });
</script>

@endsection
