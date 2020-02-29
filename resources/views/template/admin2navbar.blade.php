<li class="nav-item dropdown">
  <a class="nav-link" data-toggle="dropdown" href="#">
    {{auth()->guard('admin')->user()->nama_petugas}}
    <i class="fas fa-sign-out-alt"></i>
  </a>
  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <span class="dropdown-item dropdown-header">Username : {{auth()->guard('admin')->user()->username}}
      <br>Level : {{auth()->guard('admin')->user()->level}}</span>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Sign Out') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</li>