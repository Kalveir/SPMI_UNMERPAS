@extends('layout.main')

@section('title')
    Upload Berkas
@endsection

@section('container')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Upload Berkas</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('berkas.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                    <label for="formFile"><h5>1. Indikator :</h5></label>
                    <select class="form-select" aria-label="Default select example" id="indikator_id" name="indikator_id" autofocus>
                        @foreach ($indikator as $indk)
                            <option value="{{ $indk->id }}">
                                {{ $indk->indikator }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <h5>2. Upload Berkas</h4>
            <br>
            <div class="col-md-6 row-md-15">
                <div class="form-group">
                    <label for="formFile" class="form-label"><h6>1. Penetapan :</h6></label>
                    <br>
                    <input type="file" class="form-controll" id="formFile" required data-max-file-size="5MB" name="penetapan[]" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png" multiple>
                </div>
            </div>
            <div class="col-md-6 row-md-15">
                <div class="form-group">
                    <label for="formFile" class="form-label"><h6>2 Pelaksanaan :</h6></label>
                    <br>
                    <input type="file" class="form-controll" id="formFile" required data-max-file-size="5MB" name="pelaksanaan[]" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png" multiple>
                </div>
            </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    
</div>
@endsection