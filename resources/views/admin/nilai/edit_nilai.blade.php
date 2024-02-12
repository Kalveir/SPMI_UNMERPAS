@extends('layout.main')
@section('tittle')
Skor Nilai
@endsection
@section('judul')
Edit Skor Nilai
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <form action="{{ route('nilai.update', $nilai->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-8">
            <div class="form-group">
                <h4><strong>1. Deskripsi :</strong></h4>
                <textarea class="form-control" placeholder="Deskripsi Skor Nilai..." id="exampleFormControlTextarea1" name="deskripsi" rows="5" required autofocus>{{   $nilai->deskripsi }}</textarea>
            </div>
            <fieldset class="form-group">
                <label for="basicInput"><h4><strong>2.Indikator :</strong></h4></label>
                <select class="form-control" id="indikator_id" name="indikator_id" style="max-height:50px; overflow-y: auto;">
                    @foreach ($indikator as $idnk)
                    <option value="{{ $idnk->id }}"
                        {{  $nilai->indikator_id == $idnk->id ? 'selected' : ''  }}>
                        {{ $idnk->indikator }}</option>
                    @endforeach
                </select>
            </fieldset>
            <div class="form-group">
                <label for="basicInput"><h4><strong>3.Nilai :</strong></h4></label>
                <input type="number" class="form-control" placeholder="Skor Nilai..." value="{{ $nilai->nilai }}" id="nilai" name="nilai" required>
            </div>
                <fieldset class="form-group">
                    <label for="basicInput">4.Status :</label>
                    <select class="form-control" id="basicSelect" name="status">
                        <option value="1" @if ($nilai->status == 1) selected @endif>Aktif</option>
                        <option value="0" @if ($nilai->status == 0) selected @endif>Tidak Aktif</option>
                    </select>
                </fieldset>
            <button type="submit" class="btn btn-primary">Simpan</button>
        <div>
    </form>
  </div>
</div>
@endsection