@extends('layout.main')
@section('tittle')
SOP
@endsection
@section('judul')
Edit SOP
@endsection
@section('container')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('SOP.update', $sop->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput"><h4>1. Nama :</h4></label>
                <input type="text" class="form-control" id="basicInput" value="{{ $sop->nama }}" name="nama" required>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <fieldset class="form-group">
                <label for="basicInput"><h4>2. Jenis :</h4></label>
                <select class="form-control" id="jenis" name="jenis" >
                    <option value="Penetapan" @if ($sop->jenis == "Penetapan") selected @endif>Penetapan</option>
                    <option value="Pelaksanaan" @if ($sop->jenis == "Pelaksanaan") selected @endif>Pelaksanaan</option>
                    <option value="Evaluasi" @if ($sop->jenis == "Evaluasi") selected @endif>Evaluasi</option>
                    <option value="Pengendalian" @if ($sop->jenis == "Pengendalian") selected @endif>Pengendalian</option>
                    <option value="Peningkatan" @if ($sop->jenis == "Peningkatan") selected @endif>Peningkatan</option>
                </select>
            </fieldset>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset class="form-group">
                <label for="basicInput"><h4>3. Standar :</h4></label>
                <select class="form-control" id="standar_id" name="standar_id" style="height: 50px; overflow-y:auto;">
                    @foreach ($standard as $std)
                        <option value="{{ $std->id }}"
                            {{ $sop->standard_id == $std->id ? 'selected' : '' }}>
                            {{ $std->nama }}
                    @endforeach
                </select>
            </fieldset>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput"><h4>4. Upload Dokumen :</h4></label>
                <span><small>*Opsional</small></span>
                <input type="file" class="with-validation-filepond" data-max-file-size="50MB" name="nama_file">
            </div>
        </div>
        <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection