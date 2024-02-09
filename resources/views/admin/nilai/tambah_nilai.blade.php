@extends('layout.main')
@section('tittle')
Skor Nilai
@endsection
@section('judul')
Tambah Skor Nilai
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <form action="{{ route('nilai.store') }}" method="post">
        @csrf
        <div class="col-md-8">
          <div class="form-group">
            <h4><strong>1. Isi :</strong></h4>
            <textarea class="form-control" placeholder="Deskripsi Skor Nilai..." id="exampleFormControlTextarea1" name="deskripsi" rows="5" required autofocus></textarea>
        </div>
        <fieldset class="form-group">
            <label for="basicInput">2. Indikator :</label>
            <select class="form-control" id="indikator_id" name="indikator_id" style="height: 50px; overflow:auto;" required>
                @foreach ($indikator as $idnk)
                    <option value="{{ $idnk->id }}">
                        {{ $idnk->indikator }}
                    </option>
                @endforeach
            </select>
        </fieldset>
        <div class="form-group">
            <label for="basicInput">3. Nilai :</label>
            <input type="number" class="form-control" id="nilai" name="nilai" required>
        </div>
        <fieldset class="form-group">
            <label for="basicInput">4. Status :</label>
            <select class="form-control" id="basicSelect" name="status">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </fieldset>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>  
        </div>
            <!-- <div class="form-group">
                <label for="basicInput">1. Deskripsi :</label>
                <br>
                <textarea class="summernote" name="deskripsi" class="form-control" required></textarea>
            </div>
        <div> -->
  </div>
</div>
@endsection