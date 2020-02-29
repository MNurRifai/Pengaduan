@extends('template.admin2')
@section('title','Riwayat Pengaduan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Riwayat Pengaduan
                	@if(auth()->guard('admin')->user()->level == 'admin')
                    <a href="{{url('/riwayattanggapan/cetakpdf_detail',$pengaduan->id_pengaduan)}}" class="btn btn-sm btn-primary print float-right">Print</a>	
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
					        <input id="id_kategori" type="text" class="form-control" name="id_kategori" value="{{ $pengaduan->nama_kategori == '' ? 'Tidak Ada' : $pengaduan->nama_kategori }}" autocomplete="id_kategori" autofocus disabled>
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
					    <div class="col-md-6">
					        <!-- <input id="id_kategori" type="text" class="form-control" name="id_kategori" value="{{ $pengaduan->id_kategori }}" autocomplete="id_kategori" autofocus disabled> -->
					        @if($pengaduan->foto)
					        	<img src="{{asset('fotoupload/'.$pengaduan->foto)}}" style="max-width: 120px" alt="{{$pengaduan->foto}}">
					        @endif
					        @if($pengaduan->foto == '')
					        	<input type="text" class="form-control" name="id_kategori" value="-" disabled>
					        @endif
					    </div>
					</div>

					<div class="form-group row">
					    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
					    <div class="col-md-6">
					        <input id="status" type="text" class="form-control" name="status" value="{{ $pengaduan->status }}" autocomplete="status" autofocus disabled>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="tgl_tanggapan" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Tanggapan') }}</label>
					    <div class="col-md-6">
					        <input id="tgl_tanggapan" type="text" class="form-control" name="tgl_tanggapan" value="{{$pengaduan->tgl_tanggapan->format('d M Y')}}" autocomplete="tgl_tanggapan" autofocus disabled>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Tanggapan') }}</label>
					    <div class="col-md-6">
					        <textarea class="form-control" rows="10" id="isi_laporan" name="isi_laporan" disabled >{{$pengaduan->tanggapan}}</textarea>
					    </div>
					</div>

					<div class="form-group row">
					    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Petugas') }}</label>
					    <div class="col-md-6">
					        <input id="status" type="text" class="form-control" name="status" value="{{$pengaduan->nama_petugas}}" autocomplete="status" autofocus disabled>
					    </div>
					</div>
					<div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{url('/riwayattanggapan')}}" class="btn-sm btn btn-info">Kembali</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script type="text/javascript">
$('.print-window').click(function() {
    window.print();
});
</script>
@endpush