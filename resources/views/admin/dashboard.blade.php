@extends('layout.main')
@section('tittle')
Dashboard
@endsection
@section('judul')
Judul
@endsection
@section('container')

<div class="card">
  <div class="card-header">
    <h1>Dashboard</h1>
  </div>
  @role('Ketua Program Studi')
  <div class="card-body">
    <div class="ct-chart" id="radar-chart"></div>
      {{-- @foreach($pengisian as $data)
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
      @endforeach --}}
     

    <!-- JavaScript code to generate radar chart -->

    @endrole
  
  </div>
</div>

@endsection