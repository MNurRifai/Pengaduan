@extends('template.admin2')
@section('title','Data Kategori')
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

                <div class="card-header">Data Kategori
                    <a href="{{route('kategori.create')}}"class="float-right d-inline btn-sm btn btn-success">Tambah Kategori</a>
                </div>
                <div class="card-body">
                	<table class="table table-bordered table-hover" id="table1">
                		<thead class="text-center">
                			<tr>
                				<th width="10px">No</th>
                				<th>Nama Kategori</th>
                				<th width="150px" class="aksi">Aksi</th>
                			</tr>
                		</thead>
                		<tbody>
                			@foreach($kategori as $a)
                			<tr>
                				<td>{{$loop->iteration}}</td>
                				<td>{{$a->nama_kategori}}</td>
                				<td>
                					<a href="{{route('kategori.edit',$a->id)}}" class="btn btn-sm btn-primary">Edit</a>
                					<form action="{{route('kategori.destroy',$a->id)}}" class="d-inline" method="POST">
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
                				<th>Nama Kategori</th>
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