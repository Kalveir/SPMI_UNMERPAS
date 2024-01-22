@extends('layout.main')
@section('tittle')
Dashboard
@endsection
@section('judul')
Judul
@endsection
@section('container')
<div class="card">
  @role('Ketua Program Studi')
  <div class="card-header">
      <h1>Dashboard</h1>
  </div>
  <div class="card-body">
      @foreach($pengisian as $data)
        <div class="card-header">
          <h1>{{ $loop->iteration }}. {{$data->indikator->indikator }}</h1>
        </div>
        <div class="card-body">
          <ul>
            <li>Nilai :{{ $data->hasil_perkalian }}</li>
            <li>Target: {{ $data->target }}</li>
            <li>Status: {{ $data->hasil_perkalian > $data->target ? 'Tercapai' : 'Belum Tercapai' }}</li>
          </ul>
        </div>
      @endforeach
    @endrole
  
  </div>
</div>
@endsection