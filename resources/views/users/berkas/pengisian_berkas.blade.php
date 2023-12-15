@extends('.layout.main')

@section('title')
    SPMI | Pengisian Berkas
@endsection

@section('container')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script> --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pengisian Berkas</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('berkas.store') }}" method="post" enctype="multipart/form-data" class="dropzone" id="my-great-dropzone">
                    @csrf
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
                            <label for="basicInput">Indikator :</label>
                            <select class="form-select" id="indikator_id" name="indikator_id">
                                @foreach ($indikator as $idk)
                                    <option value="{{ $idk->id }}">
                                        {{ $idk->indikator }}
                                    </option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-md-6 row-md-15">
                        <div class="form-group">
                            <label for="basicInput">Upload Dokumen :</label>
                            <br>
                            <input type="file" class="with-validation-filepond" required multiple data-max-file-size="5MB" name="upload_file[]" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </section>
@endsection
