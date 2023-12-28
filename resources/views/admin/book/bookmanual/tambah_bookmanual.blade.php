@extends('layout.main')

@section('title')
    Tambah Buku Manual
@endsection

@section('container')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Tambah Buku Manual</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('bookmanual.store') }}" method="post">
            @csrf
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h5>1. Visi Misi :</h5></label>
                    <input id="visi_misi" type="hidden" name="visi_misi" required>
                    <trix-editor input="visi_misi"></trix-editor>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h5>2. Tujuan :</h5></label>
                    <input id="tujuan" type="hidden" name="tujuan" required>
                    <trix-editor input="tujuan"></trix-editor>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="basicInput"><h5>3. Ruang Lingkup :</h5></label>
                    <input id="ruanglingkup" type="hidden" name="ruanglingkup" required>
                    <trix-editor input="ruanglingkup"></trix-editor>
                </div>
            </div>
                <div class="col-md-6 mb-4">
                    <fieldset class="form-group">
                        <label for="basicInput"><h5>4. Standard</h5></label>
                        <select class="form-select" id="standar_id" name="standar_id">
                            @foreach ($standard as $std)
                                <option value="{{ $std->id }}">
                                    {{ $std->nama }}
                                </option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>
                <div class="col-md-6 row-md-15">
                    <div class="form-group">
                        <fieldset class="form-group">
                            <label for="basicInput"><h5>5. Jenis :</h5></label>
                            <select class="form-select" id="jenis" name="jenis">
                                    <option>Penetapan</option>
                                    <option>Pelaksanaan</option>
                                    <option>Evaluasi</option>
                                    <option>Pengendalian</option>
                                    <option>Peningkatan</option>
                            </select>
                        </fieldset>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="basicInput"><h5>6. Definisi Istilah :</h5></label>
                        <input id="definisi_istilah" type="hidden" name="definisi_istilah" required>
                        <trix-editor input="definisi_istilah"></trix-editor>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="basicInput"><h5>7. Tahapan :</h5></label>
                        <input id="tahapan" type="hidden" name="tahapan" required>
                        <trix-editor input="tahapan"></trix-editor>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <fieldset class="form-group">
                        <label for="basicInput"><h5>8. Status :</h5></label>
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