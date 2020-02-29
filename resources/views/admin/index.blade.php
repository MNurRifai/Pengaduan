@extends('template.admin2')
@section('title','Data Admin/Petugas')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if(Session::has('success'))
                    <div class="alert alert-success" style="padding-top: 20px">
                        {{Session::get('success')}}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif

                <div class="card-header">Data Admin/Petugas
                    <a href="{{route('admin.create')}}"class="float-right d-inline btn-sm  btn btn-success">Tambah User</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="table1">
                        <thead class="text-center">
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Petugas</th>
                                <th>Telp</th>
                                <th>Level</th>
                                <th width="200px" class="aksi">Aksi</th>
                            </tr>
                        </thead>
                    	<tbody>
                            @foreach($admin as $a)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$a->nama_petugas}}</td>
                                <td>{{$a->telp}}</td>
                                <td class="text-center" width="60px">
                                    <span class="btn text-center btn-sm {{$a->level == 'admin' ? 'btn-danger' : 'btn-success'}}">{{$a->level}}</span>
                                </td>
                                <td>
                                    <!-- <a href="#" class="btn-sm btn btn-warning">Reset Password</a> -->
                                    <a href="{{route('admin.show',$a->id)}}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{route('admin.edit',$a->id)}}" class="btn-sm btn btn-primary">Edit</a>
                                    <form class="d-inline" action="{{route('admin.destroy',$a->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        @if($a->id !=Auth::id())
                                        <button type="submit" class="btn-sm btn btn-danger">Hapus</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Telp</th>
                                <th>Level</th>
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