<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
  <a class="navbar-brand brand-logo" href="index.html">
    <img src="{{asset('assets/images/logo.svg')}}" alt="logo" /> </a>
  <a class="navbar-brand brand-logo-mini" href="index.html">
    <img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo" /> </a>
</div>
<div class="navbar-menu-wrapper d-flex align-items-center">
  
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
      <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false"></a>
      <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Sign Out') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </li>
  </ul>
  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
    <span class="mdi mdi-menu"></span>
  </button>
</div>