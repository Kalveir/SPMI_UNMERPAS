@extends('layout.main')
@section('tittle')
Indikator
@endsection
@section('judul')
Tambah Indikator
@endsection
@section('container')
<div class="card">
  <div class="card-body">
    <form action="{{ route('indikator.store') }}" method="post">
        @csrf
        <div class="form-group">
            
        </div>
        <div class="col-md-6 row-md-15">
            <div class="form-group">
                <h4><strong>1. Isi :</strong></h4>
                <textarea class="form-control" placeholder="Isi indikator.." id="exampleFormControlTextarea1" name="isi" rows="3" required autofocus></textarea>
            </div>
        </div>       
        <div class="col-md-6 row-md-10">
            <div class="form-group">
                <h4><strong>2. Strategi :</strong></h4>
                <textarea class="form-control" placeholder="Strategi indikator.." id="exampleFormControlTextarea1" name="strategi" rows="3" required></textarea>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset class="form-group">
                <h4><strong>3. Standar :</strong></h4>
                <select class="form-control" id="single" name="standar_id">
                    <option value="" disabled selected>--Pilih Standar--</option>
                    @foreach ($standard as $std)
                        <option value="{{ $std->id }}">
                            {{ $std->nama }}
                        </option>
                    @endforeach
                </select>
            </fieldset>
        </div>
        <div class="col-md-6 row-md-10">
            <div class="form-group">
                <h4><strong>4. Indikator :</strong></h4>
                <textarea class="form-control" placeholder="Nama indikator.." id="exampleFormControlTextarea1" name="indikator" rows="3" required></textarea>
            </div>
        </div>
        <div class="col-md-6 row-md-10">
            <div class="form-group">
                <h4><strong>5. Satuan :</strong></h4>
                <input type="text" class="form-control" placeholder="satuan" id="basicInput" name="satuan" required>
            </div>
        </div>
        <div class="col-md-6 row-md-10">
            <div class="form-group">
                <h4><strong>6. Target :</strong></h4>
                <input type="number" class="form-control"  placeholder="target indikator" id="basicInput" name="target" required>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <fieldset class="form-group">
                <h4><strong>7. Status :</strong></h4>
                <select class="form-control" id="basicSelect" name="status">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </fieldset>
        </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection