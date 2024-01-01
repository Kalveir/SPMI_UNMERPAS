@extends('.layout.main')
@section('tittle')
Contoh
@endsection
@section('judul')
Tabel
@endsection
@section('container')
<link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<table id="tabel1" class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>Rendering engine</th>
    <th>Browser</th>
    <th>Platform(s)</th>
    <th>Engine version</th>
    <th>CSS grade</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>Misc</td>
    <td>NetFront 3.1</td>
    <td>Embedded devices</td>
    <td>-</td>
    <td>C</td>
  </tr>
  <tr>
    <td>Misc</td>
    <td>NetFront 3.4</td>
    <td>Embedded devices</td>
    <td>-</td>
    <td>A</td>
  </tr>
  <tr>
    <td>Misc</td>
    <td>Dillo 0.8</td>
    <td>Embedded devices</td>
    <td>-</td>
    <td>X</td>
  </tr>
  <tr>
    <td>Misc</td>
    <td>Links</td>
    <td>Text only</td>
    <td>-</td>
    <td>X</td>
  </tr>
  <tr>
    <td>Misc</td>
    <td>Lynx</td>
    <td>Text only</td>
    <td>-</td>
    <td>X</td>
  </tr>
  <tr>
    <td>Misc</td>
    <td>IE Mobile</td>
    <td>Windows Mobile 6</td>
    <td>-</td>
    <td>C</td>
  </tr>
  <tr>
    <td>Misc</td>
    <td>PSP browser</td>
    <td>PSP</td>
    <td>-</td>
    <td>C</td>
  </tr>
  <tr>
    <td>Other browsers</td>
    <td>All others</td>
    <td>-</td>
    <td>-</td>
    <td>U</td>
  </tr>
  </tbody>
  <tfoot>
  <tr>
    <th>Rendering engine</th>
    <th>Browser</th>
    <th>Platform(s)</th>
    <th>Engine version</th>
    <th>CSS grade</th>
  </tr>
  </tfoot>
</table>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- DataTables -->
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
$(function () {
  $('#table1').DataTable()
  $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
  })
})
</script>
@endsection