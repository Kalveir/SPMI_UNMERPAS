@extends('.layout.main')

@section('title')
    SPMI | Tambah Nilai
@endsection

@section('container')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Indikator</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('nilai.store') }}" method="post">
                    @csrf
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="basicInput">Deskripsi :</label>
                            <input id="deskripsi" type="hidden" name="deskripsi" required="required">
                            <trix-editor input="deskripsi"></trix-editor>
                        </div>
                    <div>
                    <div class="col-md-6 mb-4">
                        <fieldset class="form-group">
                            <label for="basicInput">Indikator :</label>
                            <select class="form-select" id="indikator_id" name="indikator_id">
                                @foreach ($indikator as $idnk)
                                    <option value="{{ $idnk->id }}">
                                        {{ $idnk->indikator }}
                                    </option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-md-6 row-md-10">
                        <div class="form-group">
                            <label for="basicInput">Nilai :</label>
                            <input type="number" class="form-control" id="nilai" name="nilai" required>
                        </div>
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
    </section>
@endsection
