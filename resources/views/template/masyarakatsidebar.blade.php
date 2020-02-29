<div class="logo">
	<h1 class="">
		Layanan Pengaduan Masyarakat
	</h1>
</div>
<ul class="list menu-left">
	<li>
		<a href="{{url('/lapor')}}">Home</a>
	</li>
	<li>
		<a href="{{url('/riwayat')}}">Riwayat Pengaduan</a>
	</li>
	<li>
		<a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Keluar') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
	</li>
</ul>