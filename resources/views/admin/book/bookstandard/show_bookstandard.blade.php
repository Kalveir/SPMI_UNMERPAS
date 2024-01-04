@extends('layout.main')
@section('tittle')
Buku Standard
@endsection

{{-- @section('judul')
Info Buku Manual
@endsection --}}

@section('container')
<div class="card">
  <div class="card-body">
    <div class="col-md-12 text-center" >
      <img src="/assets/img/unmer.png" width="150" alt="logo unmer" class="mx-auto d-block" >
      <strong><h1 class="text-center">Standard {{ $bookstandar->standard->nama }}</h1></strong>
      <br>
  </div>
    <div class="table-responsive">
      <table class="table table-bordered table-striped" >
          <thead class="thead-dark">
              <th scope="col"><h4>1. Visi & Misi Universitas Merdeka Pasuruan</h4></th>
          </thead>
          <tbody>
              <tr>
                  <td>
                      <div class="pull-justify">
                        <h4>{!! $bookstandar->visi_misi !!}</h4>
                      </div>
                </td>
              </tr>
          </tbody>
          <thead class="thead-dark">
              <th scope="col"><h4>2. Tujuan</h4></th>
          </thead>
          <tbody>
              <tr>
                  <td>
                      <div class="pull-justify">
                        <h4>{!! $bookstandar->tujuan !!}</h4>
                      </div>
                </td>
              </tr>
          </tbody>
          <thead class="thead-dark">
              <th scope="col"><h4>3. Rasional</h4></th>
          </thead>
          <tbody>
              <tr>
                  <td>
                      <div class="pull-justify">
                        <h4>{!! $bookstandar->rasional !!}</h4>
                      </div>
                </td>
              </tr>
          </tbody>
          <thead class="thead-dark">
              <th scope="col"><h4>4. Subjek</h4></th>
          </thead>
          <tbody>
              <tr>
                  <td>
                      <div class="pull-justify">
                        <h4>{!! $bookstandar->subjek !!}</h4>
                      </div>
                </td>
              </tr>
          </tbody>
          <thead class="thead-dark">
              <th scope="col"><h4>5. Definisi Istilah</h4></th>
          </thead>
          <tbody>
              <tr>
                  <td>
                      <div class="pull-justify">
                        <h4>{!! $bookstandar->definisi_istilah !!}</h4>
                      </div>
                </td>
              </tr>
          </tbody>
      </table>
    </div>
  </div>
</div>
@endsection