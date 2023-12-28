@extends('.layout.main')

@section('title')
    SPMI | Buku Manual
@endsection

@section('container')
<div class="card">
    <div class="row">
        <div class="col-md-12 text-center" >
            <img src="/assets/images/unmer.png" width="150" alt="logo unmer" class="mx-auto d-block" >
            <h2 class="text-center">Manual {{ $bookmanual->standard->nama }}</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body printableArea">
                    <h4 class="bg-dark text-white"><b>1. Visi & Misi Universitas Merdeka Pasuruan</b></h4>
                    <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-justify">
                            <h5>{!! $bookmanual->visi_misi !!}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-body printableArea">
                <h4 class="bg-dark text-white"><b>2. Tujuan</b></h4>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-justify">
                            <h5>{!! $bookmanual->tujuan !!}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-body printableArea">
                <h4 class="bg-dark text-white"><b>3. Ruang Lingkup</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-justify">
                            <h5>{!! $bookmanual->ruanglingkup !!}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-body printableArea">
                <h4 class="bg-dark text-white"><b>4. Definisi Istilah</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-justify">
                            <h5>{!! $bookmanual->ruanglingkup !!}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-body printableArea">
                <h4 class="bg-dark text-white"><b>5. Tahapan</b></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-justify">
                            <h5>{!! $bookmanual->tahapan !!}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection