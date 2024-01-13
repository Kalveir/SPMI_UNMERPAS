@extends('layout.main')
@section('tittle')
Penilaian Berkas
@endsection
@section('judul')
Tambah Penilaian
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
                <label for="basicInput">Nama Ketua Program Studi :</label>
                <input type="text"  value="{{ $pengisian->pegawai->nama }}" class="form-control" id="basicInput" name="" required readonly>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput">Program Studi :</label>
                <input type="text"  value="{{ $pengisian->prodi->nama }}" class="form-control" id="basicInput" name="prodi" required readonly>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput">Indikator :</label>
                <input type="text"  value="{{ $pengisian->indikator->indikator }}" class="form-control" id="basicInput" name="indikator" required readonly>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput">Standard :</label>
                <input type="text"  value="{{ $pengisian->indikator->standard->nama }}" class="form-control" id="basicInput" name="standard" required readonly> 
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput">Nilai :</label>
                <input type="number"  value="{{ $pengisian->nilai }}" class="form-control" id="basicInput" name="nilai" required>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput">Komentar :</label>
                <input id="deskripsi" type="hidden" value="{{ $pengisian->komentar }}" name="komentar" required autofocus>
                <trix-editor placeholder="Input text here..." input="deskripsi" style="height: 150px"></trix-editor>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection