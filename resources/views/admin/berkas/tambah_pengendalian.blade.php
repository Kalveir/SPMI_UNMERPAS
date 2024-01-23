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
                <h4><strong>Nama Ketua Program Studi :</strong></h4>
                <h5>{{ $pengendalian->pegawai->nama }}</h5>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <h4><strong>Program Studi :</strong></h4>
                <h5>{{ $pengendalian->prodi->nama }}</h5>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <h4><strong>Indikator :</strong></h4>
                <h5>{{ $pengendalian->indikator->indikator }}</h5>
            </div>
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <h4><strong>Standar :</strong></h4>
                <h5>{{ $pengendalian->indikator->standard->nama  }}</h5>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h4><strong>Pengendalian :</strong></h4></label>
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