@extends('layout.main')
@section('tittle')
Buku Standar
@endsection
@section('judul')
Tambah Buku Standar
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <form action="{{ route('bookstandard.store') }}" method="post">
        @csrf
        <div class="col-md-8">
            <div class="form-group">
                <label for="visiMisi"><h3>1. Visi Misi :</h3></label>
                <br>
                <textarea class="summernote" name="visi_misi" class="form-control" required>{{ optional($standarbook)->visi_misi }}</textarea>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="Tujuan"><h3>2. Tujuan :</h3></label>
                <br>
                <textarea class="summernote" name="tujuan" class="form-control" required></textarea>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>3. Rasional :</h3></label>
                <br>
                <textarea class="summernote" name="rasional" class="form-control" required></textarea>
            </div>
        </div>
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                    <label for="basicInput"><h3>4. Standar :</h3></label>
                    <select class="form-control" id="single" name="standar_id" required>
                        <option value="" disabled selected>--Pilih Standar--</option>
                        @foreach ($standard as $std)
                            <option value="{{ $std->id }}">
                                {{ $std->nama }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h3>5. Subjek :</h3></label>
                    <br>
                    <textarea class="summernote" name="subjek" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h3>6. Definisi Istilah :</h3></label>
                    <br>
                    <textarea class="summernote" name="definisi_istilah" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                    <label for="basicInput"><h3>7. Status :</h3></label>
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