@extends('layout.main')
@section('tittle')
Buku Manual
@endsection
@section('judul')
Tambah Buku Manual
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <form action="{{ route('bookmanual.store') }}" method="post">
        @csrf
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>1. Visi Misi :</h3></label>
                <br>
                <textarea class="summernote"  name="visi_misi" class="form-control" required>{{ optional($manualbook)->visi_misi }}</textarea>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>2. Tujuan :</h3></label>
                <br>
                <textarea class="summernote" name="tujuan" class="form-control" required></textarea>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>3. Ruang Lingkup :</h3></label>
                <br>
                <textarea class="summernote" name="ruanglingkup" class="form-control" required></textarea>
            </div>
        </div>
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                    <label for="basicInput"><h3>4. Standar : </h3></label>
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
                <fieldset class="form-group">
                    <label for="basicInput"><h3>5. Jenis :</h3></label>
                    <select class="form-control" id="jenis" name="jenis">
                            <option>Penetapan</option>
                            <option>Pelaksanaan</option>
                            <option>Evaluasi</option>
                            <option>Pengendalian</option>
                            <option>Peningkatan</option>
                    </select>
                </fieldset>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h3>6. Definisi Istilah :</h3></label>
                    <br>
                    <textarea class="summernote" name="definisi_istilah" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h3>7. Tahapan :</h3></label>
                    <br>
                    <textarea class="summernote" name="tahapan" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                    <label for="basicInput"><h3>8. Status :</h3></label>
                    <select class="form-control" id="basicSelect" name="status">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </fieldset>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection