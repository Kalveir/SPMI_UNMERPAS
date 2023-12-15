@extends('.layout.main')

@section('title')
    SPMI | Edit Buku Standard
@endsection

@section('container')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Buku Standard</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('bookstandard.update', $bookstandar->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="basicInput">Visi Misi :</label>
                            <input id="visi_misi" type="hidden" name="visi_misi" value="{!! $bookstandar->visi_misi !!}">
                            <trix-editor input="visi_misi"></trix-editor>
                        </div>
                    </div>
                        <div class="col-md-6 mb-4">
                            <fieldset class="form-group">
                                <label for="basicInput">Standar :</label>
                                <select class="form-select" id="standar_id" name="standar_id">
                                    @foreach ($standard as $std)
                                    <option value="{{ $std->id }}"
                                        {{ $bookstandar->standard_id == $std->id ? 'selected' : '' }}>
                                        {{ $std->nama }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="basicInput">Tujuan :</label>
                                <input id="tujuan" type="hidden" name="tujuan" value="{!! $bookstandar->tujuan !!}">
                                <trix-editor input="tujuan"></trix-editor>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="basicInput">Rasional :</label>
                                <input id="rasional" type="hidden" name="rasional" value="{!! $bookstandar->rasional !!}">
                                <trix-editor input="rasional"></trix-editor>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="basicInput">Subjek :</label>
                                <input id="subjek" type="hidden" name="subjek" value="{!! $bookstandar->subjek !!}">
                                <trix-editor input="subjek"></trix-editor>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="basicInput">Definisi Istilah :</label>
                                <input id="definisi_istilah" type="hidden" name="definisi_istilah" value="{!! $bookstandar->definisi_istilah !!}">
                                <trix-editor input="definisi_istilah"></trix-editor>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <fieldset class="form-group">
                                <label for="basicInput">Status :</label>
                                <select class="form-select" id="basicSelect" name="status">
                                    <option value="1" @if ($bookstandar->status == 1) selected @endif>Aktif</option>
                                    <option value="0" @if ($bookstandar->status == 0) selected @endif>Tidak Aktif</option>
                                </select>
                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </section>
@endsection
