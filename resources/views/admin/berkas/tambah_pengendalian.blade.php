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
    <form action="{{ route('pengendalian.update', $pengendalian->id) }}" method="post">
        @csrf
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput">Nama Ketua Program Studi :</label>
                <input type="text"  value="{{ $pengendalian->pegawai->nama }}" class="form-control" id="basicInput" required readonly>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput">Program Studi :</label>
                <input type="text"  value="{{ $pengendalian->prodi->nama }}" class="form-control" id="basicInput" name="prodi" required readonly>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput">Indikator :</label>
                <input type="text"  value="{{ $pengendalian->indikator->indikator }}" class="form-control" id="basicInput" name="indikator" required readonly>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <label for="basicInput">Standard :</label>
                <input type="text"  value="{{ $pengendalian->indikator->standard->nama }}" class="form-control" id="basicInput" name="standard" required readonly> 
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput">Pengendalian :</label>
                @php
                    $pengendalianFile = $pengendalian->pengisian_berkas->where('jenis', 'Pengendalian')->first();
                @endphp
                <input id="deskripsi" type="hidden" value="{{ optional($pengendalianFile)->deskripsi }}" name="deskripsi" required autofocus>
                <trix-editor placeholder="Input text here..." input="deskripsi" style="height: 150px"></trix-editor>
            </div>
        </div>        
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection