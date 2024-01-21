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
  <div class="card-body">
    @role('Ketua Program Studi')
    <ul>
      @foreach($pengisian as $data)
          <li>
              -Nilai :{{ $data->hasil_perkalian }}
              -Target: {{ $data->target }}
              -Status: {{ $data->hasil_perkalian > $data->target ? 'Tercapai' : 'Belum Tercapai' }}
          </li>
      @endforeach
    @endrole
  </ul>
  
  </div>
</div>
@endsection