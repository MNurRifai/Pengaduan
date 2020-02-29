@extends('template.admin2')
@section('title','Laporan Pengaduan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laporan Pengaduan
                	@if(auth()->guard('admin')->user()->level == 'admin')
                		@if($pengaduan->status == 'proses')
                    	<a href="{{route('tanggapan.editcetakpdf',$pengaduan->id_pengaduan)}}" class="btn btn-sm btn-primary print float-right">Print</a>
                    	@elseif($pengaduan->status == '0')
                    	<a href="{{route('tanggapan.editcetakpdf2',$pengaduan2->id)}}" class="btn btn-sm btn-primary print float-right">Print</a>
                    	@endif
                    @endif
                </div>
                <div class="card-body">
                	<div class="form-group row">
					    <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>
					    <div class="col-md-6">
					        <input id="nik" type="text" class="form-control" name="nik" value="{{ $pengaduan->nik }}" autocomplete="nik" autofocus disabled>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
					    <div class="col-md-6">
					        <input id="nama" type="text" class="form-control" name="nama" value="{{ $pengaduan->nama }}" autocomplete="nama" autofocus disabled>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="id_kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>
					    <div class="col-md-6">
					        <input id="id_kategori" type="text" class="form-control" name="id_kategori" value="{{ $pengaduan->nama_kategori == '' ? '-' : $pengaduan->nama_kategori }}" autocomplete="id_kategori" autofocus disabled>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="isi_laporan" class="col-md-4 col-form-label text-md-right">{{ __('Laporan') }}</label>
					    <div class="col-md-6">
					        <textarea class="form-control" rows="10" id="isi_laporan" name="isi_laporan" disabled >{{$pengaduan->isi_laporan}}</textarea>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="id_kategori" class="col-md-4 col-form-label text-md-right">{{ __('Gambar') }}</label>
					    <div class="col-md-6"><!-- 
					        <input id="id_kategori" type="text" class="form-control" name="id_kategori" value="{{ $pengaduan->foto == '' ? '-' : $pengaduan->foto }}" autocomplete="id_kategori" autofocus disabled> -->
					        @if($pengaduan2->foto)
					        	<img src="{{asset('fotoupload/'.$pengaduan2->foto)}}" style="max-width: 120px" alt="{{$pengaduan->foto}}">
					        @endif
					        @if($pengaduan2->foto == '')
					        	<input type="text" class="form-control" name="id_kategori" value="-" disabled>
					        @endif
					    </div>
					</div>

					@if($pengaduan->status == '0')
					<div class="form-group row">
					    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
					    <div class="col-md-6">
					        <input id="status" type="text" class="form-control" name="status" value="{{ $pengaduan->status == '0' ? 'Terkirim' : '' }}" autocomplete="status" autofocus disabled>
					    </div>
					</div>
					@endif

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Tanggapan

                </div>
                <div class="card-body">
        <!-- $pengaduan -->
                	@if($pengaduan->status=='proses')
                	<form method="POST" action="{{route('tanggapan.update',$pengaduan->id_pengaduan)}}">
                		@csrf
                		@method('PUT')

                		<div class="form-group row">
						    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
						    <div class="col-md-6">
						        <select id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status"  required autocomplete="status" autofocus>
						        	<option value="status" selected disabled>Pilih Status</option>
						        	<option value="0" {{$pengaduan->status == '0' ? 'selected' : ''}}>Terkirim</option>
						        	<option value="proses" {{$pengaduan->status == 'proses' ? 'selected' : ''}}>Proses</option>
						        	<option value="selesai" {{$pengaduan->status == 'selesai' ? 'selected' : ''}}>Selesai</option>
						        </select>

						        @error('status')
						            <span class="invalid-feedback" role="alert">
						                <strong>{{ $message }}</strong>
						            </span>
						        @enderror
						    </div>
						    <div class="col-md-6 offset-md-4 float-right">
	                            <button type="submit" class="btn-sm btn btn-success">
	                                {{ __('Update') }}
	                            </button>
	                        </div>
						</div>
                	</form>

                	<div class="form-group row">
					    <label for="tgl_tanggapan" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal') }}</label>
					    <div class="col-md-6">
					        <input class="form-control" id="tgl_tanggapan" name="tgl_tanggapan" disabled value="{{$pengaduan->tgl_tanggapan ? $pengaduan->tgl_tanggapan->format('d M Y') : ''}}" >
					    </div>
					</div>

					<div class="form-group row">
					    <label for="tgl_tanggapan" class="col-md-4 col-form-label text-md-right">{{ __('Petugas') }}</label>
					    <div class="col-md-6">
					        <input class="form-control" id="tgl_tanggapan" name="tgl_tanggapan" disabled value="{{$pengaduan->nama_petugas}}" >
					    </div>
					</div>

					<div class="form-group row">
					    <label for="tanggapan" class="col-md-4 col-form-label text-md-right">{{ __('Tanggapan') }}</label>
					    <div class="col-md-6">
					        <textarea class="form-control" rows="10" id="tanggapan" name="tanggapan"  placeholder="Tanggapan pengaduan..."  disabled>{{$pengaduan->tanggapan}}</textarea>
					    </div>
					</div>

					<div class="form-group row mb-0">
	                        <div class="col-md-6 offset-md-4">
	                            <a href="{{url('/tanggapan')}}" class="btn-sm btn btn-info">Kembali</a>
	                        </div>
	                    </div>
					@endif



<!-- ---------------------------------------------------------------------------------------------------- -->




					@if($pengaduan->status == '0')
					<form method="POST" action="{{route('tanggapan.store')}}">
                		@csrf
                		<input type="hidden" name="id_pengaduan" id="id_pengaduan" value="{{$pengaduan2->id}}">
                		<input type="hidden" name="id_admin" id="id_admin" value="{{auth()->guard('admin')->user()->id}}">

						<div class="form-group row">
						    <label for="tgl_tanggapan" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal') }}</label>
						    @php
						    	date_default_timezone_set('Asia/Makassar');
	                        	$todayDate = date("d M Y");
	                        @endphp
						    <div class="col-md-6">
						        <input class="form-control" id="tgl_tanggapan" name="tgl_tanggapan" value="{{$todayDate}}" disabled >
						    </div>
						</div>

						<div class="form-group row">
						    <label for="tanggapan" class="col-md-4 col-form-label text-md-right">{{ __('Tanggapan') }}</label>
						    <div class="col-md-6">
						        <textarea class="form-control" rows="10" id="tanggapan" name="tanggapan"  placeholder="Tanggapan pengaduan..." required></textarea>
						    </div>
						</div>

						<div class="form-group row mb-0">
	                        <div class="col-md-6 offset-md-4">
	                            <button type="submit" class="btn-sm btn btn-success">
	                                {{ __('Tanggapi') }}
	                            </button>
	                            <a href="{{url('/tanggapan')}}" class="btn-sm btn btn-info">Kembali</a>
	                        </div>
	                    </div>
					</form>
					@endif
						
                </div>
            </div>
        </div>
    </div>
</div>
@endsection