@extends('layout.main')
@section('tittle')
Bobot Nilai
@endsection
@section('judul')
Tambah Bobot Nilai
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <form action="{{ route('bobot.store') }}" method="post">
        @csrf
        <div class="col-md-6 row-md-15">
          <fieldset class="form-group">
              <label for="basicInput"><h4><strong>1. Indikator :</strong></h4></label>
              <select class="form-control" id="single" name="indikator_id" required>
                <option value="" disabled selected>--Pilih Indikator--</option>
                  @foreach ($indikator as $idnk)
                      <option value="{{ $idnk->id }}">
                          {{ $idnk->indikator }}
                      </option>
                  @endforeach
              </select>
          </fieldset>
          <div class="form-group">
              <label for="basicInput"><h4><strong>2. Nilai :</strong></h4></label>
              <input type="number" placeholder="Bobot Nilai..."class="form-control" id="nilai" name="nilai" required autofocus>
          </div>
          
        </div>
        <br>
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