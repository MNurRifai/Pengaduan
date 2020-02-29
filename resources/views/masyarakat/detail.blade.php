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
						    <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

						    <div class="col-md-6">
						        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $masyarakat->nik }}" required autocomplete="nik" autofocus disabled>
						    </div>
						</div>

						<div class="form-group row">
						    <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

						    <div class="col-md-6">
						        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $masyarakat->nama }}" required autocomplete="nama" autofocus disabled>
						    </div>
						</div>

						<div class="form-group row">
						    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

						    <div class="col-md-6">
						        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $masyarakat->username }}" disabled required autocomplete="username" autofocus>
						    </div>
						</div>

						<div class="form-group row">
						    <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Telp') }}</label>

						    <div class="col-md-6">
						        <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ $masyarakat->telp }}" required autocomplete="telp" autofocus disabled>
						    </div>
						</div>
                		
                		<div class="form-group row mb-0">
	                        <div class="col-md-6 offset-md-4">
	                            <a href="{{url('/masyarakat')}}" class="btn-sm btn btn-primary">Kembali</a>
	                        </div>
	                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection