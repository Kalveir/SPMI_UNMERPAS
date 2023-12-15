@extends('layout.main')

@section('title')
    Tambah Pegawai
@endsection

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Data Pegawai</h4>
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
                <div class="col-md-6 mb-4">
                    <fieldset class="form-group">
                        <label for="basicInput">Jabatan :</label>
                        <select class="form-select" id="jabatan_id" name="jabatan_id">
                            @foreach ($jabatan as $jbt)
                                <option value="{{ $jbt->id }}">
                                    {{ $jbt->nama }}
                                </option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>
                <div class="col-md-6 mb-4">
                    <fieldset class="form-group">
                        <label for="basicInput">Program Studi : </label>
                        <select class="form-select" id="prodi_id" name="prodi_id">
                            @foreach ($prodi as $prd)
                                <option value="{{ $prd->id }}">
                                    {{ $prd->nama }}
                                </option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>
                <div class="col-md-6 mb-4">
                    <fieldset class="form-group">
                        <label for="basicInput">Status :</label>
                        <select class="form-select" id="basicSelect" name="status">
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