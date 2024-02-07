@extends('layout.main')
@section('tittle')
    Audhitor
@endsection
@section('judul')
    Tambah Audhitor
@endsection
@section('container')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('audhitor.store') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <fieldset class="form-group">
                        <label for="basicInput">Pilih Auditor :</label>
                        <select class="form-control" id="jabatan_id" name="jabatan_id">
                            @foreach ($roles as $jbt)
                                <option value="{{ $jbt->id }}">
                                    {{ $jbt->name }}
                                </option>
                            @endforeach
                        </select>
                    </fieldset>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tableModal"
                        title="Open User Selection Modal">
                        Seleksi Pegawai
                    </button>
                    <div class="col-md-6">
                    <table class="table" id="mainTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Program Studi</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelutama" name="data_tabel">
                            <!-- Main table content will be populated dynamically -->
                        </tbody>
                    </table>
                    </div>
                    <input type="hidden" id="data_tabel_input" name="data_tabel">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    {{-- <button type="button" class="btn btn-primary" onclick="ambilData()">Simpan</button> --}}
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="tableModal"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tableModalLabel">Pemilihan Audhitor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="basic-datatables">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Progam Studi</th>
                                <th>Jabatan</th>
                                <th>Akasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($single_role as $sr)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sr->nama }}</td>
                                    <td>{{ $sr->prodi->nama }}</td>
                                    <td>
                                        @foreach ($sr->roles as $jabatan)
                                            {{ optional($jabatan)->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn btn-success"
                                            onclick="pilihData('{{ $sr->id }},{{ $sr->nama }},{{ $sr->prodi->nama }},{{ $sr->roles->first()->name }}')">Pilih</button>
                                            <input type="hidden" name="data[{{ $sr->id }}][id]" value="{{ $sr->id }}">
                                            
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function pilihData(namaData) {
            // Periksa apakah data sudah ada di tabel utama
            if (!isDataExists(namaData)) {
                namaDatas = namaData.split(',');

                // Buat baris HTML untuk data terpilih
                var newRow = "<tr><td>" + (document.getElementById("mainTable").rows.length + 0) +
                    "</td><td class='id_users' hidden>" + namaDatas[0] + "</td><td>" + namaDatas[1] + "</td><td>" +
                    namaDatas[2] + "</td><td>" + namaDatas[3] +
                    "</td><td><button class='btn btn-danger' onclick='hapusData(this)'>Hapus</button></td></tr>";

                // Tambahkan baris ke tabel utama
                $("#mainTable").append(newRow);
                updateFormData();
            } else {
                // Data sudah ada, mungkin berikan pesan atau lakukan tindakan lain
                alert("Data sudah ada");
            }

            // Tutup modal
            $("#tableModal").modal("hide");
        }

        // Fungsi untuk memeriksa apakah data sudah ada di tabel utama
        function isDataExists(namaData) {
            var exists = false;
            $("#mainTable td:nth-child(2)").each(function() {
                if ($(this).text().trim() === namaData.split(',')[0].trim()) {
                    exists = true;
                    return false; // Keluar dari loop jika data sudah ditemukan
                }
            });
            return exists;
        }

        // Fungsi untuk menghapus baris data dari tabel utama
        function hapusData(button) {
            var row = button.closest("tr");
            row.remove();
            updateFormData();
        }

        function updateFormData() {
            var array_data = [];
            // Ambil data dari setiap baris tabel
            $("#mainTable tbody tr").each(function() {
                var id_users = $(this).find('td:eq(1)').text().trim();
                // Konversi nilai id_users ke integer
                var id_users_integer = parseInt(id_users, 10);

                // Pastikan bahwa ID yang diambil sesuai dengan struktur yang diharapkan
                array_data.push(id_users_integer);
            });

            // Perbarui nilai input tersembunyi dengan data sebagai array langsung
            $("#data_tabel_input").val(JSON.stringify(array_data));
        }
        
    </script>



@endsection
