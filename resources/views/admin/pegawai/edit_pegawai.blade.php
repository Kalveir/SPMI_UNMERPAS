@extends('layout.main')
@section('tittle')
Pegawai
@endsection
@section('judul')
Edit Pegawai
@endsection
@section('container')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <div class="form-group">
                <label for="basicInput">Nama Pengguna</label>
                <input type="text" class="form-control" id="basicInput" name="nama"
                    value="{{ $pegawai->nama }}" required autofocus>
            </div>
            <div class="form-group">
                <label for="basicInput">Email</label>
                <input type="email" class="form-control" id="basicInput" name="email"
                    value="{{ $pegawai->email }}" required>
            </div>
            <div class="form-group">
                <label for="basicInput">Password</label>
                <input type="text" class="form-control" id="basicInput" name="password">
                <small><b>(*Optional)</b></small>
            </div>
            <br>
            <fieldset class="form-group">
                <label for="basicInput">Jabatan</label>
                <select class="form-control" id="jabatan_id" name="jabatan_id">
                    @foreach ($jabatan as $jbt)
                    <option value="{{ $jbt->id }}"
                        {{ $pegawai->hasRole($jbt->name) == $jbt->id ? 'selected' : '' }}>
                        {{ $jbt->name }}
                    @endforeach
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="basicInput">Program Studi :</label>
                <select class="form-control" id="prodi_id" name="prodi_id">
                    @foreach ($prodi as $prd)
                    <option value="{{ $prd->id }}"
                        {{ $pegawai->prodi_id == $prd->id ? 'selected' : '' }}>
                        {{ $prd->nama }}</option>
                    @endforeach
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="basicInput">Status</label>
                <select class="form-control" id="basicSelect" name="status">
                    <option value="1" @if ($pegawai->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if ($pegawai->status == 0) selected @endif>Tidak Aktif
                    </option>
                </select>
            </fieldset>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection