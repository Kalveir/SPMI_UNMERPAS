@extends('layout.main')
@section('tittle')
Indikator
@endsection
@section('judul')
Edit Indikator
@endsection
@section('container')
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('indikator.update', $indikator->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <h4><strong>1. Isi :</strong></h4>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="3" required autofocus>{{ $indikator->isi }}</textarea>
            </div>
        </div>        
        <div class="col-md-6 row-md-10">
            <div class="form-group">
                <h4><strong>2. Strategi :</strong></h4>
                <textarea class="form-control" placeholder="Strategi indikator.." id="exampleFormControlTextarea1" name="strategi" rows="3" required>{{ $indikator->strategi }}</textarea>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset class="form-group">
                <h4><strong>3. Standar :</strong></h4>
                <select class="form-control" id="standar_id" name="standar_id" style="height: 50px; overflow-y:auto;">
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
                <h4><strong>4. Indikator :</strong></h4>
                <textarea class="form-control" placeholder="Nama indikator.." id="exampleFormControlTextarea1" name="indikator" rows="3" required>{{ $indikator->indikator }}</textarea>
            </div>
        </div>
        <div class="col-md-6 row-md-10">
            <div class="form-group">
                <h4><strong>5. Satuan :</strong></h4>
                <input type="text" value="{{ $indikator->satuan }}" class="form-control" id="basicInput" name="satuan" required>
            </div>
        </div>
        <div class="col-md-6 row-md-10">
            <div class="form-group">
                <h4><strong>6. Target :</strong></h4>
                <input type="number" value="{{ $indikator->target }}" class="form-control" id="basicInput" name="target" required>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset class="form-group">
                <h4><strong>7. Status :</strong></h4>
                <select class="form-control" id="basicSelect" name="status">
                    <option value="1" @if ($indikator->status == 1) selected @endif>Aktif</option>
                    <option value="0" @if ($indikator->status == 0) selected @endif>Tidak Aktif</option>
                </select>
            </fieldset>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection