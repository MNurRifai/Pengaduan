@extends('template.admin2')
@section('title','Data Masyarakat')
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

                <div class="card-header">Data Masyarakat
                    <a href="{{route('masyarakat.create')}}"class="float-right d-inline btn-sm btn btn-success">Tambah User</a>
                </div>
                <div class="card-body">
                	<table class="table table-bordered table-hover" id="table1">
                		<thead class="text-center">
                			<tr>
                				<th width="10px">No</th>
                				<th>NIK</th>
                				<th>Nama</th>
                				<th>Telp</th>
                				<th width="200px" class="aksi">Aksi</th>
                			</tr>
                		</thead>
                		<tbody>
                			@foreach($masyarakat as $a)
                			<tr>
                				<td>{{$loop->iteration}}</td>
                				<td>{{$a->nik}}</td>
                				<td>{{$a->nama}}</td>
                				<td>{{$a->telp}}</td>
                				<td>
                					<!-- <a href="#" class="btn btn-sm btn-warning">Reset Password</a> -->
                					<a href="{{route('masyarakat.show',$a->nik)}}" class="btn btn-sm btn-info">Detail</a>
                					<a href="{{route('masyarakat.edit',$a->nik)}}" class="btn btn-sm btn-primary">Edit</a>
                					<form action="{{route('masyarakat.destroy',$a->nik)}}" class="d-inline" method="POST">
                						@csrf
                						@method('delete')
                						<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                					</form>
                				</td>
                			</tr>
                			@endforeach
                		</tbody>
                		<tfoot class="text-center">
                			<tr>
                				<th>No</th>
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