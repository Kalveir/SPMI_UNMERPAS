@extends('layout.main')
@section('tittle')
Penilaian Berkas
@endsection
@section('judul')
Tambah Penilaian Evaluasi
@endsection
@section('container')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<div class="card">
  <div class="card-body">
    <form action="{{ route('penilaian.updateNilai', $pengisian->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <h4><strong>Nama Ketua Program Studi :</strong></h4>
                <h5>{{ $pengisian->pegawai->nama }}</h5>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <h4><strong>Program Studi :</strong></h4>
                <h5>{{ $pengisian->prodi->nama }}</h5>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <h4><strong>Indikator :</strong></h4>
                <h5>{{ $pengisian->indikator->indikator }}</h5>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <h4><strong>Standar :</strong></h4>
                <h5>{{ $pengisian->indikator->standard->nama  }}</h5>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput"><h4>Nilai :</h4></label>
                <input type="number"  value="{{ $pengisian->nilai }}" class="form-control" id="basicInput" name="nilai" required max="100" autofocus>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h4>Komentar :</h4></label>
                <input id="deskripsi" type="hidden" value="{{ $pengisian->komentar }}" name="komentar" required>
                <trix-editor placeholder="Input text here..." input="deskripsi" style="height: 150px"></trix-editor>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection