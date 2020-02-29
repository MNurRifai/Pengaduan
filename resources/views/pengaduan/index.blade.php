@extends('template.pengaduan')
@section('content')	
	<div class="col-lg-8 text-center">
		<h3 class="mb-30 title_color">Riwayat Pengaduan</h3>
		<!-- <table class="table ">
			<thead class="table-head">
				<tr>
					<th>Tanggal Pengaduan</th>
					<th>Kategori</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
			<tfoot>
				<tr>
					<th>Tanggal Pengaduan</th>
					<th>Kategori</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
-->
		<div class="progress-table-wrap">
			<div class="progress-table">
				<div class="table-head">
					<div class="serial" >#</div>
					<div class="country">Tanggal Pengaduan</div>
					<div class="serial">Kategori</div>
					<div class="visit">Status</div>
					<div class="percentage" style="width: 10px;margin-left: 20px">Aksi</div>
				</div>
				@foreach($pengaduan as $p)
				<div class="table-row">
					<div class="serial">{{$loop->iteration}}</div>
					<div class="country">{{$p->tgl_pengaduan->format('d M Y')}}</div>
					<div class="serial">{{$p->nama_kategori == '' ? '-' : $p->nama_kategori}}</div>
					<div class="serial">
						@if($p->status == '0')
							<span class="genric-btn primary circle">{{$p->status == '0' ? 'Terkirim' : $p->status}}</span>
						@elseif($p->status == 'proses')
							<span class="genric-btn danger circle">{{$p->status}}</span>
						@else
							<span class="genric-btn success circle">{{$p->status}}</span>
						@endif
					</div>
					<div class="serial">
						<a href="{{url('/detail',$p->id)}}" class="genric-btn info circle arrow" style="margin-left: 20px">Detail<span class="lnr lnr-arrow-right"></span></a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection