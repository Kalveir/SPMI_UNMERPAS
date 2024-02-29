@extends('layout.main')
@section('tittle')
Formulir
@endsection
@section('judul')
Tambah Formulir
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <form action="{{ route('formulir.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput"><h4>1. Nama :</h4></label>
                <input type="text" class="form-control" id="basicInput" name="nama" required autofocus>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
                <fieldset class="form-group">
                    <label for="basicInput"><h4>2. Jenis :</h4></label>
                    <select class="form-control" id="jenis" name="jenis">
                            <option>Penetapan</option>
                            <option>Pelaksanaan</option>
                            <option>Evaluasi</option>
                            <option>Peningkatan</option>
                            <option>Pengendalian</option>
                    </select>
                </fieldset>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset class="form-group">
                <label for="basicInput"><h4>3. Standar :</h4></label>
                <select class="form-control" id="standar_id" name="standar_id" style="height: 50px; overflow-y:auto;">
                    @foreach ($standard as $std)
                        <option value="{{ $std->id }}">
                            {{ $std->nama }}
                        </option>
                    @endforeach
                </select>
            </fieldset>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-group">
                <label for="formFile" class="form-label"><h4>4. Upload Dokumen :</h4></label>
                <br>
                <input type="file" class="form-controll" id="formFile" required data-max-file-size="5MB" name="nama_file" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png">
            </div>
        </div>
        <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection