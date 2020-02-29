@extends('template.admin2')
@section('title','Edit User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data User</div>
                <div class="card-body">
                	<form method="POST" action="{{route('masyarakat.update',$masyarakat->nik)}}">
                		@csrf
                		@method('PUT')
                		<div class="form-group row">
					    <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

					    <div class="col-md-6">
					        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $masyarakat->nik }}" required autocomplete="nik" autofocus>

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
						        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $masyarakat->nama }}" required autocomplete="nama" autofocus>

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
						        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $masyarakat->username }}" required autocomplete="username" autofocus>

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
						        <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ $masyarakat->telp }}" required autocomplete="telp" autofocus>

						        @error('telp')
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