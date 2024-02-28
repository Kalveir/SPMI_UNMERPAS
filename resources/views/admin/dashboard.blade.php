@extends('layout.main')
@section('tittle')
    Dashboard
@endsection
@section('container')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <div class="card">
        <!-- <div class="card-header">
        <h1>Dashboard</h1>
      </div> -->
        <div class="card-body">
            <div class="panel-header bg-primary-gradient">
                <div class="page-inner py-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <img src="/assets/img/unmer.png" alt="Dashboard Image" class="mr-md-4 mb-3 mb-md-0" width="100"
                                height="100">
                        </div>
                        <div>
                            <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                            <h4 class="text-white op-7 mb-2">Sistem Penjaminan Mutu Internal</h4>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                @role('Ketua Program Studi')
                    <!-- jumlah dosen -->
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-body skew-shadow">
                                <h3 class="op-8">Jumlah Dosen :</h3>
                                <i class="fas fa-users fa-3x icon-transparent"></i>
                                <h1>{{ $jumlah_dosen }}</h1>
                            </div>
                        </div>
                    </div>
                    <!-- jumlah buku Berkas -->
                    <div class="col-md-4">
                        <div class="card card-warning">
                            <div class="card-body skew-shadow">
                                <h3 class="op-8">Jumlah Berkas :</h3>
                                <i class="fas fa-file-alt fa-3x icon-transparent"></i>
                                <h1>{{ $berkas_submit }}</h1>
                            </div>
                        </div>
                    </div>
                @endrole
                @role('PPM')
                    <div class="col-md-4">
                        <div class="card card-secondary">
                            <div class="card-body skew-shadow">
                                <h3 class="op-8">Jumlah Auditor :</h3>
                                <i class="fas fa-solid fa-user-tie fa-3x icon-transparent"></i>
                                <h1>{{ $jumlah_auditor }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-info">
                            <div class="card-body skew-shadow">
                                <h3 class="op-8">Jumlah Buku Standar :</h3>
                                <i class="fas fa-book fa-3x icon-transparent"></i>
                                <h1>{{ $bookstandard_jumlah }}</h1>
                            </div>
                        </div>
                    </div>
                @endrole
                @role('Admin')
                    <div class="col-md-4">
                        <div class="card card-secondary">
                            <div class="card-body skew-shadow">
                                <h3 class="op-8">Jumlah Pegawai :</h3>
                                <i class="fas fa-users fa-3x icon-transparent"></i>
                                <h1>{{ $jumlah_user }}</h1>
                            </div>
                        </div>
                    </div>
                @endrole
                @role('Admin')
                    <div class="col-md-4">
                        <div class="card card-warning">
                            <div class="card-body skew-shadow">
                                <h3 class="op-8">Penggunaan Data Sistem :</h3>
                                <i class="fas fa-chart-pie fa-3x icon-transparent"></i>
                                <h1>{{ $folder_size }}</h1>
                            </div>
                        </div>
                    </div>
                @endrole
                <div class="col-md-4">
                    <div class="card card-danger">
                        <div class="card-body skew-shadow">
                            <h3 class="op-8">Jumlah Indikator :</h3>
                            <i class="fas fa-tasks fa-3x icon-transparent"></i>
                            <h1>{{ $indikator_jumlah }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <form method="get" action="{{ route('dashboard.index') }}" style="display: flex; flex-wrap: wrap;">
                <div class="col-md-2 mb-4" style="flex: 1; margin-right: 10px;">
                    <label for="yearSelector"><strong>Pilih Tahun :</strong></label>
                    <select class="form-control" name="year" id="yearSelector" onchange="this.form.submit()">
                        @foreach ($distinctYears as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- @if (Auth::user()->hasRole(['Admin', 'PPM'])) --}}
                    @can('kelola statistik')
                    <div class="col-md-4 mb-4" style="flex: 2;">
                        <label for="prodiSelector"><strong>Pilih Program Studi :</strong></label>
                        <select class="form-control" name="prodi" id="prodiSelector" onchange="this.form.submit()">
                            @foreach ($prodiList as $program_studi)
                                <option value="{{ $program_studi->id }}"
                                    {{ request('prodi') == $program_studi->id ? 'selected' : '' }}>
                                    {{ $program_studi->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endcan
                {{-- @endif --}}
            </form>



            <div id="chart">
                <h2 class="text-center mb-4"><strong>Statistik Audit Mutu Internal</strong></h2>
            </div>
            @php
                $chartData = [];

                foreach ($pengisian as $index => $data) {
                    $nilai = $data->nilai;
                    $status = $nilai > $data->target ? 'Tercapai' : 'Belum Tercapai';

                    $chartData[] = [
                        'indikator' => $data->indikator->indikator,
                        'target' => $data->target,
                        'bobot_nilai' => $data->bobot_nilai,
                        'nilai' => $nilai,
                        'status' => $status,
                        'kode' => 'C' . ($index + 1),
                    ];
                }
            @endphp
        </div>

        <script>
            var chartData = @json($chartData);

            var options = {
                series: [{
                        name: 'Indikator',
                        data: chartData.map(item => item.target),
                        indikator: chartData.map(item => item.indikator)
                    },
                    {
                        name: 'AMI',
                        data: chartData.map(item => item.nilai),
                        Status: chartData.map(item => item.status),
                        indikator: chartData.map(item => item.indikator)
                    },
                ],
                chart: {
                    height: 700, // Increase the height as needed
                    type: 'radar',
                },

                dataLabels: {
                    enabled: true
                },
                plotOptions: {
                    radar: {
                        size: 280,
                        polygons: {
                            strokeColors: '#ccc',
                            fill: {
                                colors: ['#eee', '#fff']
                            }
                        }
                    }
                },
                colors: ['#D22B2B', '#007FFF'],
                markers: {
                    size: 3,
                    strokeColor: ['#D22B2B', '#007FFF'],
                    strokeWidth: 5,
                },
                tooltip: {
                    x: {
                        formatter: function(val, {
                            seriesIndex,
                            dataPointIndex,
                            w
                        }) {
                            var indikatorValue = w.config.series[seriesIndex].indikator[dataPointIndex];
                            return `${indikatorValue}`;
                        },
                    },
                    y: {
                        formatter: function(val, {
                            seriesIndex,
                            dataPointIndex,
                            w
                        }) {
                            var seriesName = w.config.series[seriesIndex].name;

                            // Menampilkan status hanya pada series 'AMI'
                            if (seriesName === 'AMI') {
                                var StatusValue = w.config.series[seriesIndex].Status[dataPointIndex];
                                return `Nilai: ${val} | Status: ${StatusValue}`;
                            } else {
                                return `Target: ${val}`;
                            }
                        }
                    },
                },
                xaxis: {
                    categories: chartData.map(item => item.kode),
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>


    @endsection
