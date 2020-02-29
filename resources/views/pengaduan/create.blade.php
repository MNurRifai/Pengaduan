@extends('template.pengaduan')
@section('content')	
	<div class="col-lg-8 text-center">
		<form action="{{route('pengaduan.store')}}" enctype="multipart/form-data" method="POST">
			@csrf
			<aside class="single-sidebar-widget newsletter_widget">
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                        </div>
                        @php
                            date_default_timezone_set('Asia/Makassar');
                        	$todayDate = date("d M Y");
                        @endphp
                        <input class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" disabled value="{{$todayDate}}">
                    </div>
                </div>

                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                        </div>
                        <textarea class="form-control" rows="10" id="isi_laporan" name="isi_laporan" placeholder="Ketik laporan Anda..." required=""></textarea>
                        @error('isi_laporan')
				            <span class="invalid-feedback" role="alert">
				                <strong>{{ $message }}</strong>
				            </span>
				        @enderror
                    </div>
                </div>

                <div class="form-group input-group-icon mt-10">
					<div class="input-group-prepend ">
                        <div class="input-group-text"><i class="fa fa-book" aria-hidden="true"></i></div>
						<div class="form-select" id="default-select2">
							<select name="id_kategori" id="id_kategori" class="{{$errors->has('id_kategori') ? 'is-invalid' : ' ' }}" value="{{old('id_kategori')}}" required autofocus>
	                        	<option value="id_kategori" selected required disabled>Pilih Kategori</option>
	                        	@foreach($kategori as $k)
	                        	<option value="{{$k->id}}">{{$k->nama_kategori}}</option>
	                        	@endforeach
	                        </select>

	                        @error('id_kategori')
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
	                    	@enderror
						</div>
					</div>
				</div>

                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                        </div>
                        <input type="file" name="foto" id="foto" class="form-control"  >
                    </div>
                </div>

                <input type="hidden" name="nik" id="nik" value="{{auth()->guard('masyarakat')->user()->nik}}">

                <div class="form-group">
                    <button class="btn btn-lg btn-danger float-right" type="submit">Lapor</button>
                </div>        
            </aside>
		</form>
	</div>
@endsection