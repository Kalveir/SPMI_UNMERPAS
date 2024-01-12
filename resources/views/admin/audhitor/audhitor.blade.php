@extends('layout.main')
@section('tittle')
Audhitor
@endsection

@section('judul')
Daftar Audhitor
@endsection

@section('container')
<div class="card">
  <div class="card-header">
    <a href="{{ route('audhitor.create') }}" class="btn btn-success mb-3">
        <span>Tambah Audhitor</span>
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="basic-datatables" class="table table-bordered table-striped" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Jabatan</th>
                <th>Audhitor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    
                </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection