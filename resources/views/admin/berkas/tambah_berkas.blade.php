@extends('layout.main')

@section('title')
    SPMI| Upload Berkas
@endsection

@section('container')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Upload Berkas</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('berkas.upload_file', $pengisian->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}
            <div class="col-md-6 row-md-15">
                <div class="form-group">
                    <fieldset class="form-group">
                        <label for="basicInput"><h5>1. Jenis File :</h5></label>
                        {{-- <label for="basicInput">2.  Jenis :</label> --}}
                        <select class="form-select" id="jenis" name="jenis">
                                <option>Penetapan</option>
                                <option>Pelaksanaan</option>
                                <option>Evaluasi</option>
                                <option>Peningkatan</option>
                                <option>Pengendalian</option>
                        </select>
                    </fieldset>
                </div>
            </div>
            <h5>3. Upload Berkas</h4>
            <div class="col-md-15row-md-15">
                <div class="form-group">
                    <input type="file" class="form-controll" id="formFile" required data-max-file-size="5MB" name="nama_file[]" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png" multiple>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput">Deskripsi :</label>
                    <input id="deskripsi" type="hidden" name="deskripsi" required>
                    <trix-editor input="deskripsi"></trix-editor>
                </div>
            </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    
</div>
@endsection