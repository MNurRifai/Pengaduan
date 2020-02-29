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

                <div class="card-header">Laporan Pengaduan
                    @if(auth()->guard('admin')->user()->level == 'admin')
                    <a href="{{route('tanggapan.indexcetakpdf')}}" class="btn btn-sm btn-primary print float-right">Print</a>
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
                                <th width="80px">Status</th>
                				<th width="50px" class="aksi">Aksi</th>
                			</tr>
                		</thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach($pengaduan as $p)
                            @if($p->status == '0' || $p->status == 'proses')
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$p->tgl_pengaduan->format('d M Y')}}</td>
                                <td>{{$p->nik}}</td>
                                <td>{{$p->nama_kategori == '' ? '-' : $p->nama_kategori}}</td>
                                @if($p->status == '0')
                                    <td>
                                        <span class="btn btn-warning btn-sm">{{$p->status == '0' ? 'Terkirim' : $p->status}}</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="btn btn-sm btn-danger">{{$p->status}}</span>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{url('/tanggapi',$p->id)}}" class="btn btn-sm btn-info">Detail/Tanggapi</a>
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
        columnDefs : [{ targets : "aksi", searchable: false}]
    });
  });
</script>
@endpush