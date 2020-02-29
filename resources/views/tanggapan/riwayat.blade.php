@extends('template.admin2')
@section('title','Laporan Pengaduan')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(Session::has('success'))
                    <div class="alert alert-success" style="padding-top: 20px">
                        {{Session::get('success')}}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

                <div class="card-header">Riwayat Pengaduan
                    @if(auth()->guard('admin')->user()->level == 'admin')
                    <a href="{{url('/riwayattanggapan/cetakpdf')}}" class="btn btn-sm btn-primary print float-right">Print</a>
                    @endif
                </div>
                <div class="card-body">
                	<table class="table table-bordered table-hover" id="table1">
                		<thead class="text-center">
                			<tr>
                				<th width="10px">No</th>
                                <th width="200px">Tanggal</th>
                				<th width="60px">NIK</th>
                				<th>Kategori</th>
                                <th width="80px" class="status">Status</th>
                				<th width="50px" class="aksi">Aksi</th>
                			</tr>
                		</thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($pengaduan as $p)
                            @if($p->status == 'selesai')
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$p->tgl_pengaduan->format('d M Y')}}</td>
                                <td>{{$p->nik}}</td>
                                <td>{{$p->nama_kategori == '' ? '-' : $p->nama_kategori}}</td>
                                <td>
                                    <span class="btn btn-sm btn-success">{{$p->status}}</span>
                                </td>
                                <td>
                                    <a href="{{url('/detailriwayat',$p->id)}}" class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                		<tfoot class="text-center">
                			<tr>
                				<th>No</th>
                                <th>Tanggal</th>
                				<th>NIK</th>
                				<th>Nama</th>
                				<th>Telp</th>
                				<th>Aksi</th>
                			</tr>
                		</tfoot>
                	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
  $(function () {
    $("#table1").DataTable({
        columnDefs : [{ "targets" : [4,5], "searchable": false}]
    });
  });
</script>
@endpush