@extends('layout.main')
@section('tittle')
Dashboard
@endsection
@section('judul')
Judul
@endsection
@section('container')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<div class="card">
  <!-- <div class="card-header">
    <h1>Dashboard</h1>
  </div> -->
  <div class="card-body">
        <div id="chart">
            <div class="col-md-2 mb-4">
                <label for="yearSelector"><strong>Pilih Tahun :</strong></label>
                <select class="form-control" name="year" id="yearSelector">
                   @foreach($tahuns as $year)
                      <option value="{{ $year }}">{{ $year }}</option>
                   @endforeach
                </select>
            </div>
          </div>
          @php
              $chartData = [];

              foreach($pengisian as $index => $data) {
                  $nilai = $data->nilais->nilai * $data->bobot_nilai;
                  $status = $nilai > $data->target ? 'Tercapai' : 'Belum Tercapai';

                  $chartData[] = [
                      'indikator' => $data->indikator->indikator,
                      'target' => $data->target,
                      'bobot_nilai' => $data->bobot_nilai,
                      'nilai' => $nilai,
                      'status' => $status,
                      'kode' => 'C' . ($index + 1)
                  ];
              }
          @endphp
</div>

<script>
  var chartData = @json($chartData);

    var options = {
        series: [
            {
                name: 'Indikator',
                data: chartData.map(item => item.target),
                indikator : chartData.map(item => item.indikator)
            },
            {
                name: 'AMI',
                data: chartData.map(item => item.nilai),
                Status: chartData.map(item => item.status),
                indikator : chartData.map(item => item.indikator)
            },
        ],
        chart: {
            height: 350,
            type: 'radar',
        },
        plotOptions: {
            radar: {
                size: 140,
                polygons: {
                    strokeColors: '#ccc',
                    fill: {
                        colors: ['#eee', '#fff']
                    }
                }
            }
        },
        title: {
            text: 'Statistik Radar Chart'
        },
        colors: ['#AA0000', '#00AA00'],
        markers: {
            size: 3,
            strokeColor: ['#AA0000', '#00AA00'],
            strokeWidth: 5,
        },
        tooltip: {
            x: {
                formatter: function (val, { seriesIndex, dataPointIndex, w }) {
                    var indikatorValue = w.config.series[seriesIndex].indikator[dataPointIndex];
                    return `${indikatorValue}`;
                },
            },
            y: {
                formatter: function (val, { seriesIndex, dataPointIndex, w }) {
                    var seriesName = w.config.series[seriesIndex].name;

                    // Menampilkan status hanya pada series 'AMI'
                    if (seriesName === 'AMI') {
                        var StatusValue = w.config.series[seriesIndex].Status[dataPointIndex];
                        return `Nilai: ${val} | Status: ${StatusValue}`;
                    } else {
                        return `Nilai: ${val}`;
                    }
                }
            },
        },
        xaxis: {
            categories:chartData.map(item => item.kode),
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

@endsection