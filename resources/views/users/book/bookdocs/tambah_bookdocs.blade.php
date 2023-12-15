@extends('.layout.main')

@section('title')
    SPMI | Tambah Buku SOP
@endsection

@section('container')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Buku SOP</h4>
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
                            <label for="basicInput">Jenis :</label>
                            <input type="text" class="form-control" id="basicInput" name="jenis" required>
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
                            <label for="basicInput">Upload Dokumen :</label>
                            <br>
                            <input type="file" class="with-validation-filepond" required data-max-file-size="5MB" name="nama_file" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .jpeg, .jpg, .png">
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </section>
@endsection
