@extends('layout.main')
@section('tittle')
Formulir
@endsection
@section('judul')
Edit Formulir
@endsection
@section('container')
<div class="card">
  <div class="card-header">
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
            <fieldset class="form-group">
                <label for="basicInput">Jenis :</label>
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
                <label for="basicInput">Standar :</label>
                <select class="form-control" id="standar_id" name="standar_id">
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