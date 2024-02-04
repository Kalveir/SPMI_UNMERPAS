@extends('layout.main')
@section('tittle')
Penilaian Berkas
@endsection
@section('judul')
Tambah Penilaian
@endsection
@section('container')
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
                <br>
                <textarea class="summernotet" name="deskripsi" class="form-control" required>{{ optional($pengendalianFile)->deskripsi }}</textarea>
            </div>
        </div>        
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection