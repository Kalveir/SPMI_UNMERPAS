@extends('layout.main')
@section('tittle')
Buku Standard
@endsection
@section('judul')
Edit Buku Standard
@endsection
@section('container')

<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <form action="{{ route('bookstandard.update', $bookstandar->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>1. Visi Misi :</h3></label>
                <br>
                <textarea class="summernote" name="visi_misi" class="form-control" required>{!! $bookstandar->visi_misi !!}</textarea>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>2. Tujuan :</h3></label>
                <br>
                <textarea class="summernote" name="tujuan" class="form-control" required>{!! $bookstandar->tujuan !!}</textarea>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="basicInput"><h3>3. Rasional :</h3></label>
                <br>
                <textarea class="summernote" name="rasional" class="form-control" required>{!! $bookstandar->rasional !!}</textarea>
                
            </div>
        </div>
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                    <label for="basicInput"><h3>4. Standar :</h3></label>
                    <select class="form-control" id="standar_id" name="standar_id">
                        @foreach ($standard as $std)
                        <option value="{{ $std->id }}"
                            {{ $bookstandar->standard_id == $std->id ? 'selected' : '' }}>
                            {{ $std->nama }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h3>5. Subjek :</h3></label>
                    <br>
                    <textarea class="summernote" name="subjek" class="form-control" required>{!! $bookstandar->subjek !!}</textarea>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h3>6.Definisi Istilah :</h3></label>
                    <br>
                    <textarea class="summernote" name="definisi_istilah" class="form-control" required>{!! $bookstandar->definisi_istilah !!}</textarea>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                <fieldset>
                    <label for="basicInput">7. Status :</label>
                    <select class="form-control" id="basicSelect" name="status">
                        <option value="1" @if ($bookstandar->status == 1) selected @endif>Aktif</option>
                        <option value="0" @if ($bookstandar->status == 0) selected @endif>Tidak Aktif</option>
                    </select>
                </fieldset>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection