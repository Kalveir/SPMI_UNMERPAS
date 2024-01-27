@extends('layout.main')
@section('tittle')
Buku Manual
@endsection
@section('judul')
Edit Buku Manual
@endsection
@section('container')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('bookmanual.update', $bookmanual->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>1. Visi Misi :</h3></label>
                <textarea class="summernote" name="visi_misi" class="form-control" required>{{ $bookmanual->visi_misi }}</textarea>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>2. Tujuan :</h3></label>
                <textarea class="summernote" name="tujuan" class="form-control" required>{{ $bookmanual->tujuan }}</textarea>
            </div>
        </div><div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>3. Ruang Lingkup :</h3></label>
                <textarea class="summernote" name="ruanglingkup" class="form-control" required>{{ $bookmanual->ruanglingkup }}</textarea>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset class="form-group">
                <label for="basicInput"><h3>4. Standar :</h3></label>
                <select class="form-control" id="standar_id" name="standar_id">
                    @foreach ($standard as $std)
                    <option value="{{ $std->id }}"
                        {{ $bookmanual->standard_id == $std->id ? 'selected' : '' }}>
                        {{ $std->nama }}
                    @endforeach
                </select>
                </select>
            </fieldset>
        </div>
        <div class="col-md-6 row-md-15">
            <fieldset class="form-group">
                <label for="basicInput"><h3>5. Jenis :</h3></label>
                <select class="form-control" id="jenis" name="jenis">
                    <option value="Penetapan" @if ($bookmanual->jenis == "Penetapan") selected @endif>Penetapan</option>
                    <option value="Pelaksanaan" @if ($bookmanual->jenis == "Pelaksanaan") selected @endif>Pelaksanaan</option>
                    <option value="Evaluasi" @if ($bookmanual->jenis == "Evaluasi") selected @endif>Evaluasi</option>
                    <option value="Pengendalian" @if ($bookmanual->jenis == "Pengendalian") selected @endif>Pengendalian</option>
                    <option value="Peningkatan" @if ($bookmanual->jenis == "Peningkatan") selected @endif>Peningkatan</option>
                </select>
            </fieldset>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>6. Definisi Istilah :</h3></label>
                <textarea class="summernote" name="definisi_istilah" class="form-control" required>{{ $bookmanual->definisi_istilah }}</textarea>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>7. Tahapan</h3></label>
                <textarea class="summernote" name="tahapan" class="form-control" required>{{ $bookmanual->tahapan }}</textarea>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset class="form-group">
                <label for="basicInput">8. Status :</label>
                <select class="form-control" id="basicSelect" name="status">
                    <option value="1" @if ($bookmanual->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if ($bookmanual->status == 0) selected @endif>Tidak Aktif</option>
                </select>
            </fieldset>
        </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection