@extends('.layout.main')

@section('title')
    SPMI | Edit Indikator
@endsection

@section('container')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Indikator</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('indikator.update', encrypt($indikator->id)) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6 row-md-15">
                        <div class="form-group">
                            <label for="basicInput">Isi :</label>
                            <input type="text"  value="{{ $indikator->isi }}" class="form-control" id="basicInput" name="isi" required>
                        </div>
                    </div>
                    <div class="col-md-6 row-md-10">
                        <div class="form-group">
                            <label for="basicInput">Strategi :</label>
                            <input type="text" value="{{ $indikator->strategi }}" class="form-control" id="basicInput" name="strategi" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <fieldset class="form-group">
                            <label for="basicInput">Standar :</label>
                            <select class="form-select" id="standar_id" name="standar_id">
                                @foreach ($standard as $std)
                                <option value="{{ $std->id }}"
                                    {{  $indikator->standard_id == $std->id ? 'selected' : ''  }}>
                                    {{ $std->nama }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-md-6 row-md-10">
                        <div class="form-group">
                            <label for="basicInput">Indikator :</label>
                            <input type="text" value="{{ $indikator->indikator }}" class="form-control" id="basicInput" name="indikator" required>
                        </div>
                    </div>
                    <div class="col-md-6 row-md-10">
                        <div class="form-group">
                            <label for="basicInput">Satuan :</label>
                            <input type="text" value="{{ $indikator->satuan }}" class="form-control" id="basicInput" name="satuan" required>
                        </div>
                    </div>
                    <div class="col-md-6 row-md-10">
                        <div class="form-group">
                            <label for="basicInput">Target :</label>
                            <input type="text" value="{{ $indikator->target }}" class="form-control" id="basicInput" name="target" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <fieldset class="form-group">
                            <label for="basicInput">Status :</label>
                            <select class="form-select" id="basicSelect" name="status">
                                <option value="1" @if ($indikator->status == 1) selected @endif>Aktif</option>
                                <option value="0" @if ($indikator->status == 0) selected @endif>Tidak Aktif</option>
                            </select>
                        </fieldset>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </section>
@endsection
