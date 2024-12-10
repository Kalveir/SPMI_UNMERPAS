@extends('layout.main')
@section('tittle')
Formulir
@endsection
@section('judul')
Edit Formulir
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <form action="{{ route('formulir.update', $formulir->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT');
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput"><h4>1. Nama :</h4></label>
                <input type="text" class="form-control" id="basicInput" value="{{ $formulir->nama }}" name="nama" required>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <fieldset class="form-group">
                <label for="basicInput"><h4>2. Jenis :</h4></label>
                <select class="form-control" id="jenis" name="jenis">
                    <option value="Penetapan" @if ($formulir->jenis == "Penetapan") selected @endif>Penetapan</option>
                    <option value="Pelaksanaan" @if ($formulir->jenis == "Pelaksanaan") selected @endif>Pelaksanaan</option>
                    <option value="Evaluasi" @if ($formulir->jenis == "Evaluasi") selected @endif>Evaluasi</option>
                    <option value="Pengendalian" @if ($formulir->jenis == "Pengendalian") selected @endif>Pengendalian</option>
                    <option value="Peningkatan" @if ($formulir->jenis == "Peningkatan") selected @endif>Peningkatan</option>
                </select>
            </fieldset>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset class="form-group">
                <label for="basicInput"><h4>3. Standar :</h4></label>
                <select class="form-control" id="single" name="standar_id">
                    <option value="" disabled selected>--Pilih Standar--</option>
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
                <label for="basicInput"><h4>4. Upload Dokumen :</h4></label>
                <span>*opsional</span>
                <input type="file" class="with-validation-filepond" data-max-file-size="50MB" name="nama_file">
            </div>
        </div>
        <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection