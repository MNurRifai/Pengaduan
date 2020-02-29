<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item nav-category">Main Menu</li>
		<li class="nav-item">
		  	<a class="nav-link" href="{{url('/dashboard/admin')}}">
		    	<i class="menu-icon typcn typcn-document-add"></i>
		    	<span class="menu-title">Dashboard</span>
		  	</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
				<i class="menu-icon typcn typcn-document-add"></i>
					<span class="menu-title">User</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="auth">
				<ul class="nav flex-column sub-menu">
				  	<li class="nav-item">
				    	<a class="nav-link" href="{{url('admin')}}">Admin/Petugas</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" href="{{url('masyarakat')}}">Masyarakat</a>
				  	</li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
		  	<a class="nav-link" href="{{url('/kategori')}}">
		    	<i class="menu-icon typcn typcn-document-add"></i>
		    	<span class="menu-title">Kategori</span>
		  	</a>
		</li>
		<li class="nav-item">
		  	<a class="nav-link" href="{{url('/tanggapan')}}">
		    	<i class="menu-icon typcn typcn-document-add"></i>
		    	<span class="menu-title">Laporan Pengaduan</span>
		  	</a>
		</li>
	</ul>
</nav>