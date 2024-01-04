@extends('layout.main')
@section('tittle')
Pegawai
@endsection
@section('judul')
Tambah Pegawai
@endsection
@section('container')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('pegawai.store') }}" method="post">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="basicInput">Nama Pengguna :</label>
                <input type="text" class="form-control" id="basicInput" name="nama" autofocus required>
            </div>
            <div class="form-group">
                <label for="basicInput">Email :</label>
                <input type="email" class="form-control" id="basicInput" name="email" required>
            </div>
            <div class="form-group">
                <label for="basicInput">Password :</label>
                <input type="text" class="form-control" id="basicInput" name="password" required>
            </div>
            <br>

            <fieldset class="form-group">
                <label for="basicInput">Jabatan :</label>
                <select class="form-control" id="jabatan_id" name="jabatan_id">
                    @foreach ($jabatan as $jbt)
                        <option value="{{ $jbt->id }}">
                            {{ $jbt->name }}
                        </option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group">
                <label for="basicInput">Program Studi : </label>
                <select class="form-control" id="prodi_id" name="prodi_id">
                    @foreach ($prodi as $prd)
                        <option value="{{ $prd->id }}">
                            {{ $prd->nama }}
                        </option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group">
                <label for="basicInput">Status :</label>
                <select class="form-control" id="basicSelect" name="status">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </fieldset>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection