<a href="index3.html" class="brand-link">
  <img src="{{asset('assets2/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
       style="opacity: .8">
  <span class="brand-text font-weight-light" style="font-size: 18px">Pengaduan Masyarakat</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{asset('assets2/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block" >{{auth()->guard('admin')->user()->nama_petugas}}</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <!-- @includes('') -->
      <li class="nav-item">
        <a href="{{url('/dashboard/admin')}}" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      @if(auth()->guard('admin')->user()->level == 'admin')
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-address-book"></i>
          <p>
            User
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin')}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Admin/Petugas</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('masyarakat')}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Masyarakat</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="{{url('/kategori')}}" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Kategori
          </p>
        </a>
      </li>
      @endif

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-clipboard-list"></i>
          <p>
            Pengaduan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/tanggapan')}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Pengaduan</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/riwayattanggapan')}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Riwayat Pengaduan</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>