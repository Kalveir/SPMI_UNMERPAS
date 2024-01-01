@extends('layout.main')
@section('tittle')
Buku Standard
@endsection
@section('judul')
Tambah Buku Standard
@endsection
@section('container')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('bookstandard.store') }}" method="post">
        @csrf
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>1. Visi Misi :</h3></label>
                <input id="visi_misi" type="hidden" name="visi_misi" required>
                <trix-editor input="visi_misi"></trix-editor>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>2. Rasional :</h3></label>
                <input id="rasional" type="hidden" name="rasional" required>
                <trix-editor input="rasional"></trix-editor>
            </div>
        </div>
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                    <label for="basicInput"><h3>3. Standard :</h3></label>
                    <select class="form-control" id="standar_id" name="standar_id">
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
                    <label for="basicInput"><h3>4. Subjek :</h3></label>
                    <input id="subjek" type="hidden" name="subjek" required>
                    <trix-editor input="subjek"></trix-editor>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h3>5. Definisi Istilah :</h3></label>
                    <input id="definisi_istilah" type="hidden" name="definisi_istilah" required>
                    <trix-editor input="definisi_istilah"></trix-editor>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h3>6. Tujuan :</h3></label>
                    <input id="tujuan" type="hidden" name="tujuan" required>
                    <trix-editor input="tujuan"></trix-editor>
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