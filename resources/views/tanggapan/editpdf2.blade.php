<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Detail Pengaduan | Pengaduan Masyarakat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets2/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets2/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets2/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('assets2/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets2/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets2/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets2/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <link rel="stylesheet" href="{{asset('assets2/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="invoice p-3 mb-3">
    <div class="row">
      <div class="col-12">
        <h4>
          @php
              date_default_timezone_set('Asia/Makassar');
            $todayDate = date("d/m/Y");
          @endphp
          <i class="fas fa-globe"></i> Laporan Detail Pengaduan [{{$pengaduan->id}}]
          <small class="float-right">Date: {{$todayDate}}</small>
        </h4>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Gambar</th>
              <th>Tanggal Tanggapan</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Status</th>
              <th>Isi Laporan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>
                  @if($pengaduan->foto)
                    <img src="{{asset('fotoupload/'.$pengaduan->foto)}}" style="max-width: 120px" alt="{{$pengaduan->foto}}">
                  @endif
                  @if($pengaduan->foto == '')
                    -
                  @endif
                </td>
                <td>{{$pengaduan->tgl_pengaduan->format('d M Y')}}</td>
                <td>{{$pengaduan->nik}}</td>
                <td>{{$pengaduan->nama}}</td>
                <td>{{$pengaduan->nama_kategori == '' ? 'Tidak Ada' : $pengaduan->nama_kategori}}</td>
                <td>{{$pengaduan->status == '0' ? 'Terkirim' : ''}}</td>
                <td>{{$pengaduan->isi_laporan}}</td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>