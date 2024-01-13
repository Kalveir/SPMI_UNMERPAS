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
        {{-- <form action="{{ route('audhitor.store') }}" method="POST">
            @csrf
        </form> --}}
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tableModal" title="Open User Selection Modal">
                Seleksi Pegawai
            </button>                

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
            <button type="button" class="btn btn-primary" onclick="ambilData()">Simpan</button>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="tableModal" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tableModalLabel">Pemilihan Audhitor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
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
                            @foreach ($sr->roles as $jabatan )
                                {{ $jabatan->name }}
                            @endforeach
                    </td>
                    <td>
                        <button class="btn btn-success" onclick="pilihData('{{ $sr->id }},{{ $sr->nama }},{{ $sr->prodi->nama }},{{ $sr->roles->first()->name}}')">Pilih</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
    function pilihData(namaData) {
    // Periksa apakah data sudah ada di tabel utama
        if (!isDataExists(namaData)) {
            namaDatas = namaData.split(',');

            // Buat baris HTML untuk data terpilih
            var newRow = "<tr><td>" + (document.getElementById("mainTable").rows.length + 0) + "</td><td class='id_users' hidden>" + namaDatas[0] + "</td><td>" + namaDatas[1] + "</td><td>" + namaDatas[2] + "</td><td>" + namaDatas[3] + "</td><td><button class='btn btn-danger' onclick='hapusData(this)'>Hapus</button></td></tr>";

            // Tambahkan baris ke tabel utama
            $("#mainTable").append(newRow);
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
        $("#mainTable td:nth-child(2)").each(function () {
            if ($(this).text().trim() === namaData.split(',')[0].trim()) {
                exists = true;
                return false; // Keluar dari loop jika data sudah ditemukan
            }
        });
        return exists;
    }

    // Fungsi untuk menghapus baris data dari tabel utama
    function hapusData(button) 
    {
        var row = button.closest("tr");
        row.remove();
    }

    function ambilData() 
    {
        var data = [];
        const jabatan_id = $("#jabatan_id").val();

        $("#tabelutama tr").each(function () {
            var rowData = {};
            $(this).find(".id_users").each(function () {
                rowData['id_users'] = $(this).text();
            });
            data.push(rowData);
        });

        // Menambahkan token CSRF ke dalam data yang dikirim
        var token = $('meta[name="csrf-token"]').attr('content');
        data._token = token;

        $.ajax({
            type: "POST",
            url: "{{ route('audhitor.store') }}",
            data: {
                data: data,
                jabatan_id: jabatan_id,
                _token: token
            },
            dataType: 'json',
            success: function (response) {
                $('#in').val(response.data.value);
            },
            error: function (xhr, status, error) {
                console.error("Gagal:", error);
            }
        });
    }



</script>


@endsection
