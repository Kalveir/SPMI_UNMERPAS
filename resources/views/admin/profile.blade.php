@extends('layout.main')
@section('tittle')
Profil
@endsection
@section('judul')
Profil Pengguna
@endsection
@section('container')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
        <div class="col-md-6">
            <div class="form-group">
                <label for="basicInput">Nama :</label>
                <input type="text" class="form-control" id="basicInput"
                    value="{{ $profile->nama }}" readonly>
            </div>
            <div class="form-group">
                <label for="basicInput">Email :</label>
                <input type="email" class="form-control" id="basicInput"
                    value="{{ $profile->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="basicInput">Jabatan :</label>
                <input type="text" class="form-control" id="basicInput"
                    value="{{ optional($profile->roles->first())->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="basicInput">Fakultas :</label>
                <input type="text" class="form-control" id="basicInput"
                    value="{{ $profile->prodi->fakultas->nama }}" readonly>
            </div>
            <div class="form-group">
                <label for="basicInput">Program Studi :</label>
                <input type="text" class="form-control" id="basicInput"
                    value="{{ $profile->prodi->nama }}" readonly>
            </div>
            <br>
            <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#update_modal">
                <span><i class="fas fa-edit"></i>Edit</span>
            </button>
  </div>
  <div class="modal" id="update_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Profil</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <!-- Form Input -->
                <form action="{{ route('profile.update', $profile->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Pengguna : </label>
                        <input type="text" name="nama" value="{{ $profile->nama }}" id="nama" class="form-control" placeholder="Masukkan Nama" required>
                        <br>
                        <label for="nama">Email Pengguna : </label>
                        <input type="email" name="email" value="{{ $profile->email }}" id="email" class="form-control" placeholder="Masukkan Email" required>
                        <br>
                        <label for="nama">Password : </label>
                        <small><b>(*Optional)</b></small>
                        <input type="text" name="password" id="password" class="form-control" placeholder="Masukkan Password baru">
                        <br>
                    </div>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection