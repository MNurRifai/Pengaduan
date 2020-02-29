@extends('template.admin2')
@section('title','Edit User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data User</div>
                <div class="card-body">
                	<form method="POST" action="{{route('admin.update',$admin->id)}}">
                		@csrf
                		@method('PUT')
                		<div class="form-group row">
					    <label for="nama_petugas" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

					    <div class="col-md-6">
					        <input id="nama_petugas" type="text" class="form-control @error('nama_petugas') is-invalid @enderror" name="nama_petugas" value="{{ $admin->nama_petugas }}" required autocomplete="nama_petugas" autofocus>

					        @error('nama_petugas')
					            <span class="invalid-feedback" role="alert">
					                <strong>{{ $message }}</strong>
					            </span>
					        @enderror
					    </div>
						</div>

						<div class="form-group row">
						    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

						    <div class="col-md-6">
						        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $admin->username }}" required autocomplete="username" autofocus>

						        @error('username')
						            <span class="invalid-feedback" role="alert">
						                <strong>{{ $message }}</strong>
						            </span>
						        @enderror
						    </div>
						</div>

						<div class="form-group row">
						    <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Telp') }}</label>

						    <div class="col-md-6">
						        <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ $admin->telp }}" required autocomplete="telp" autofocus>

						        @error('telp')
						            <span class="invalid-feedback" role="alert">
						                <strong>{{ $message }}</strong>
						            </span>
						        @enderror
						    </div>
						</div>

						<div class="form-group row">
						    <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

						    <div class="col-md-6">
						        <select id="level" type="text" class="form-control @error('level') is-invalid @enderror" name="level"  required autocomplete="level" autofocus>
						        	<option value="level" selected disabled>Pilih Level User</option>
						        	<option value="admin" {{$admin->level == 'admin' ? 'selected' : ''}}>Admin</option>
						        	<option value="petugas" {{$admin->level == 'petugas' ? 'selected' : ''}}>Petugas</option>
						        </select>

						        @error('level')
						            <span class="invalid-feedback" role="alert">
						                <strong>{{ $message }}</strong>
						            </span>
						        @enderror
						    </div>
						</div>

	                    <div class="form-group row mb-0">
	                        <div class="col-md-6 offset-md-4">
	                            <button type="submit" class="btn-sm btn btn-success">
	                                {{ __('Update') }}
	                            </button>
	                            <a href="{{url('/admin')}}" class="btn-sm btn btn-info">Kembali</a>
	                        </div>
	                    </div>
                	</form>
                	
                </div>
            </div>
        </div>
    </div>
</div>


@endsection