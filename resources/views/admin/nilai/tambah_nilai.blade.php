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
                <h4><strong>1. Deskripsi :</strong></h4>
                <textarea class="form-control" placeholder="Deskripsi Skor Nilai..." id="exampleFormControlTextarea1" name="deskripsi" rows="5" required autofocus></textarea>
            </div>
            <fieldset class="form-group">
                <label for="basicInput"><h4><strong>2. Indikator :</strong></h4></label>
                    <select class="form-control" name="indikator_id" id="single" required>
                        <option value="" disabled selected>--Pilih Indikator--</option>
                        @foreach ($indikator as $idnk)
                            <option value="{{ $idnk->id }}">{{ $idnk->indikator }}</option>
                        @endforeach
                    </select>
            </fieldset>
            <div class="form-group">
                <label for="basicInput"><h4><strong>3. Skor Nilai :</strong></h4></label>
                <input type="number" class="form-control" placeholder="Skor Nilai..." id="nilai" name="nilai" required>
            </div>
            <fieldset class="form-group">
                <label for="basicInput"><h4><strong>4. Status :</strong></h4></label>
                <select class="form-control" id="basicSelect" name="status">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </fieldset>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>  
    </div>
</div>
@endsection