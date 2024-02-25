@extends('layout.main')
@section('tittle')
Bobot Nilai
@endsection
@section('judul')
Edit Bobot Nilai
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <form action="{{ route('bobot.update', $bobot->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-8">
            <fieldset class="form-group">
                <label for="basicInput"><h4><strong>1. Indikator :</strong></h4></label>
                <select class="form-control" id="indikator_id" name="indikator_id" style="height: 50px; overflow-y:auto;">
                    @foreach ($indikator as $idnk)
                    <option value="{{ $idnk->id }}"
                        {{  $bobot->indikator_id == $idnk->id ? 'selected' : ''  }}>
                        {{ $idnk->indikator }}</option>
                    @endforeach
                </select>
            </fieldset>
            <div class="form-group">
                <label for="basicInput"><h4><strong>2. Nilai :</strong></h4></label>
                <input type="number" placeholder="Bobot Nilai..." class="form-control" value="{{ $bobot->bobot }}" id="nilai" name="nilai" required autofocus>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        <div>
    </form>
  </div>
</div>
@endsection