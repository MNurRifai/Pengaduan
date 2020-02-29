@extends('template.admin2')
@section('title','Tambah User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data User</div>
                <div class="card-body">
                	<form method="POST" action="{{route('masyarakat.store')}}">
                		@csrf
                		<div class="form-group row">
						    <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

						    <div class="col-md-6">
						        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>

						        @error('nik')
						            <span class="invalid-feedback" role="alert">
						                <strong>{{ $message }}</strong>
						            </span>
						        @enderror
						    </div>
						</div>

						<div class="form-group row">
						    <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

						    <div class="col-md-6">
						        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

						        @error('nama')
						            <span class="invalid-feedback" role="alert">
						                <strong>{{ $message }}</strong>
						            </span>
						        @enderror
						    </div>
						</div>

						<div class="form-group row">
						    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

						    <div class="col-md-6">
						        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

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
						        <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" required autocomplete="telp" autofocus>

						        @error('telp')
						            <span class="invalid-feedback" role="alert">
						                <strong>{{ $message }}</strong>
						            </span>
						        @enderror
						    </div>
						</div>

						<div class="form-group row">
	                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

	                        <div class="col-md-6">
	                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

	                            @error('password')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

	                        <div class="col-md-6">
	                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
	                        </div>
	                    </div>

	                    <div class="form-group row mb-0">
	                        <div class="col-md-6 offset-md-4">
	                            <button type="submit" class="btn-sm btn btn-success">
	                                {{ __('Tambah') }}
	                            </button>
	                            <a href="{{url('/masyarakat')}}" class="btn-sm btn btn-info">Kembali</a>
	                        </div>
	                    </div>
	                    
                	</form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection