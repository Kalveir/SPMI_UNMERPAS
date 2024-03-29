@extends('layout.main')
@section('tittle')
    Penilaian Berkas
@endsection
@section('judul')
    Tambah Penilaian Evaluasi
@endsection
@section('container')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('penilaian.updateNilai', encrypt($pengisian->id)) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-6 row-md-15">
                    <div class="form-group">
                        <h4><strong>Nama Ketua Program Studi :</strong></h4>
                        <h5>{{ $pengisian->pegawai->nama }}</h5>
                    </div>
                </div>
                <div class="col-md-6 row-md-15">
                    <div class="form-group">
                        <h4><strong>Program Studi :</strong></h4>
                        <h5>{{ $pengisian->prodi->nama }}</h5>
                    </div>
                </div>
                <div class="col-md-6 row-md-15">
                    <div class="form-group">
                        <h4><strong>Indikator :</strong></h4>
                        <h5>{{ $pengisian->indikator->indikator }}</h5>
                    </div>
                </div>
                <div class="col-md-6 row-md-15">
                    <div class="form-group">
                        <h4><strong>Standar :</strong></h4>
                        <h5>{{ $pengisian->indikator->standard->nama }}</h5>
                    </div>
                </div>
                <div class="col-md-6 row-md-15">
                    <div class="form-group">
                        <h4><strong>Penilaian :</strong></h4>
                        <select class="form-control" id="nilai" name="nilai" style="height: 50px; overflow-y:auto;">
                            @foreach ($nilai as $nl)
                                <option value="{{ $nl->nilai }}"
                                    {{ $pengisian->nilai  == $nl->nilai ? 'selected' : ''}}>
                                    {!! $nl->deskripsi !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                          <h4><strong>Komentar :</strong></h4>
                        <br>
                        <textarea class="summernotet" name="komentar" class="form-control" required>{!! $pengisian->komentar !!}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
