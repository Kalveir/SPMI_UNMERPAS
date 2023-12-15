@extends('layout.main')

@section('title')
    Tambah Indikator
@endsection

@section('container')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Data Indikator</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('indikator.store') }}" method="post">
            @csrf
            <div class="col-md-6 row-md-15">
                <div class="form-group">
                    <label for="basicInput">Isi :</label>
                    <input type="text" class="form-control" id="basicInput" name="isi" required autofocus>
                </div>
            </div>
            <div class="col-md-6 row-md-10">
                <div class="form-group">
                    <label for="basicInput">Strategi :</label>
                    <input type="text" class="form-control" id="basicInput" name="strategi" required>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <fieldset class="form-group">
                    <label for="basicInput">Standar :</label>
                    <select class="form-select" id="standar_id" name="standar_id">
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
                    <label for="basicInput">Indikator :</label>
                    <input type="text" class="form-control" id="basicInput" name="indikator" required>
                </div>
            </div>
            <div class="col-md-6 row-md-10">
                <div class="form-group">
                    <label for="basicInput">Satuan :</label>
                    <input type="text" class="form-control" id="basicInput" name="satuan" required>
                </div>
            </div>
            <div class="col-md-6 row-md-10">
                <div class="form-group">
                    <label for="basicInput">Target :</label>
                    <input type="number" class="form-control" id="basicInput" name="target" required>
                </div>
            </div>
                <div class="col-md-6 mb-4">
                    <fieldset class="form-group">
                        <label for="basicInput">Status :</label>
                        <select class="form-select" id="basicSelect" name="status">
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