<div class="logo">
	<h1 class="">
		Layanan Pengaduan Masyarakat
	</h1>
</div>
<ul class="list menu-left">
	<li>
		<a href="{{url('/')}}">Home</a>
	</li>
	<li>
		<a href="{{url('/tentang')}}">Tentang</a>
	</li>
	<li>
		<a href="{{url('/register')}}">Daftar</a>
	</li>
	<li>
		<div class="dropdown">
			<button type="button" class="dropdown-toggle" data-toggle="dropdown">
				Masuk
			</button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="{{url('/login/masyarakat')}}">Masyarakat</a>
				<a class="dropdown-item" href="{{url('/login/admin')}}">Petugas</a>
			</div>
		</div>
	</li>
</ul>