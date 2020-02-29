@extends('template.admin2')
@section('title','Detail User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detail User</div>
                <div class="card-body">
                		<div class="form-group row">
						    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

						    <div class="col-md-6">
						        <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $admin->id }}" required autocomplete="id" autofocus disabled>
						    </div>
						</div>

						<div class="form-group row">
						    <label for="nama_petugas" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

						    <div class="col-md-6">
						        <input id="nama_petugas" type="text" class="form-control @error('nama_petugas') is-invalid @enderror" name="nama_petugas" value="{{ $admin->nama_petugas }}" required autocomplete="nama_petugas" autofocus disabled>
						    </div>
						</div>

						<div class="form-group row">
						    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

						    <div class="col-md-6">
						        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $admin->username }}" disabled required autocomplete="username" autofocus>
						    </div>
						</div>

						<div class="form-group row">
						    <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Telp') }}</label>

						    <div class="col-md-6">
						        <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ $admin->telp }}" required autocomplete="telp" autofocus disabled>
						    </div>
						</div>

						<div class="form-group row">
						    <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

						    <div class="col-md-6">
						        <input id="level" type="text" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ $admin->level }}" disabled required autocomplete="level" autofocus disabled>
						    </div>
						</div>
                		
                		<div class="form-group row mb-0">
	                        <div class="col-md-6 offset-md-4">
	                            <a href="{{url('/admin')}}" class="btn-sm btn btn-primary">Kembali</a>
	                        </div>
	                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection