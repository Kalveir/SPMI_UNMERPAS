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
        <div class="card-header">
        </div>
        <div class="card-body">
          <ul>
          @foreach($pengisian as $data)
            <li>{{ $loop->iteration }}. {{$data->indikator->indikator }}</li>
            <li>Target: {{ $data->target }}</li>
            <li>Bobot: {{ $data->bobot_nilai}}</li>
            <li>evaluasi: {{ 
              $data->nilais->nilai * $data->bobot_nilai
            }}</li>
          @endforeach
          </ul>
        </div>
     
            <!-- <li>evaluasi: {{ $data->nilai > $data->target ? 'Tercapai' : 'Belum Tercapai' }}</li> -->

    <!-- JavaScript code to generate radar chart -->

    @endrole
  
  </div>
</div>

@endsection