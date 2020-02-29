@extends('template.pengaduan')
@section('content')	
	<div class="col-lg-8 col-md-8">
			<aside class="single-sidebar-widget newsletter_widget">
                <h3 class="mb-10 title_color">NIK</h3>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                        </div>
                        <input class="form-control" id="nik" name="nik" disabled value="{{$pengaduan->nik}}">
                    </div>
                </div>

                <h3 class="mb-10 title_color">Nama</h3>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                        </div>
                        <input class="form-control" id="nik" name="nik" disabled value="{{$pengaduan->nama}}">
                    </div>
                </div>

                <h3 class="mb-10 title_color">Tanggal</h3>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                        </div>
                        <input class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" disabled value="{{$pengaduan->tgl_pengaduan->format('d M Y')}}">
                    </div>
                </div>

                <h3 class="mb-10 title_color">Kategori</h3>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-book" aria-hidden="true"></i></div>
                        </div>
                        <input class="form-control" id="kategori" name="kategori" disabled value="{{$pengaduan->id_kategori ? $pengaduan->kategori->nama_kategori : '-'}}">
                    </div>
                </div>

                <h3 class="mb-10 title_color">Laporan</h3>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                        </div>
                        <textarea class="form-control" rows="10" id="isi_laporan" name="isi_laporan" placeholder="Ketik laporan Anda..." disabled required>{{$pengaduan->isi_laporan}}</textarea>
                    </div>
                </div>

                <h3 class="mb-10 title_color">Gambar</h3>
                @if($pengaduan->foto == '')
                    <div class="form-group d-flex flex-row">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-image" aria-hidden="true"></i></div>
                            </div>
                            <input class="form-control" disabled required value="-">
                        </div>
                    </div>
                @endif
                @if($pengaduan->foto)
                <div class="row gallery-item">
                    <div class="col-md-4">
                        <img src="{{asset('fotoupload/'.$pengaduan->foto)}}" class="single-gallery-image"  alt="{{$pengaduan->foto}}">
                    </div>
                </div>
                @endif

                <h3 class="mb-10 title_color">Status</h3>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-check" aria-hidden="true"></i></div>
                        </div>
                        @if($pengaduan->status == '0')
                            <input class="form-control" id="status" name="status" disabled value="{{$pengaduan->status == '0' ? 'Terkirim' : $pengaduan->status}}">
                        @elseif($pengaduan->status == 'proses')
                            <input class="form-control" id="status" name="status" disabled value="{{$pengaduan->status}}">
                        @else
                            <input class="form-control" id="status" name="status" disabled value="{{$pengaduan->status}}">
                        @endif
                    </div>
                </div>

                <hr>

                <h3 class="mb-10 title_color">Tanggal Tanggapan</h3>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                        </div>
                        <input class="form-control" id="status" name="status" disabled value="{{$pengaduan->tgl_tanggapan == '' ? '-' : $pengaduan->tgl_tanggapan->format('d M Y')}}">
                    </div>
                </div>

                <h3 class="mb-10 title_color">Tanggapan</h3>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                        </div>
                        <textarea class="form-control" rows="10" id="isi_laporan" name="isi_laporan" placeholder="Ketik laporan Anda..." disabled required>{{$pengaduan->tanggapan == '' ? '-' : $pengaduan->tanggapan}}</textarea>
                    </div>
                </div>

                <h3 class="mb-10 title_color">Petugas</h3>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                        </div>
                        <input class="form-control" id="kategori" name="kategori" disabled value="{{$pengaduan->nama_petugas == '' ? '-' : $pengaduan->nama_petugas}}">
                    </div>
                </div>

                <hr>
            </aside>

            <div class="form-group">
                <a href="{{url('/riwayat')}}" class="btn btn-lg btn-primary float-right">Kembali</a>
            </div>
	</div>
@endsection