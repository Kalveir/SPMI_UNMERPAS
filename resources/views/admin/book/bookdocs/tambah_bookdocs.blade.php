@extends('layout.main')

@section('title')
    Tambah Buku Docs
@endsection

@section('container')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Buku Docs</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('bookdocs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 row-md-15">
                <div class="form-group">
                    <label for="basicInput">Nama :</label>
                    <input type="text" class="form-control" id="basicInput" name="nama" required autofocus>
                </div>
            </div>
            <div class="col-md-6 row-md-15">
                <div class="form-group">
                    <fieldset class="form-group">
                        <label for="basicInput">Jenis :</label>
                        <select class="form-select" id="jenis" name="jenis">
                                <option>Penetapan</option>
                                <option>Pelaksanaan</option>
                                <option>Evaluasi</option>
                        </select>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                    <label for="basicInput">Standar :</label>
                    <select class="form-select" id="standar_id" name="standar_id">
                        @foreach ($standard as $std)
                            <option value="{{ $std->id }}">
                                {{ $std->nama }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col-md-6 row-md-15">
                <div class="form-group">
                    <label for="formFile" class="form-label">Upload Dokumen :</label>
                    <br>
                    <input type="file" class="form-controll" id="formFile" required data-max-file-size="5MB" name="nama_file" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png">
                </div>
            </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    
</div>
@endsection