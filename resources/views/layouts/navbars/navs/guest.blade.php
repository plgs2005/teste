<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-wrapper">
    <a class="navbar-brand" href="/">{{ $namePage }}</a>
    </div>
   
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">
      <li class="nav-item @if ($activePage == 'users') active @endif">
          <a href="{{ route('users.index') }}" class="nav-link">
            <i class="now-ui-icons design_bullet-list-67"></i> {{ __("Lista de Usuários") }}
          </a>
        </li>

        <li class="nav-item @if ($activePage == 'register') active @endif">
          <a href="{{ route('register') }}" class="nav-link">
            <i class="now-ui-icons tech_mobile"></i> {{ __("Cadastre-se") }}
          </a>
        </li>
        <li class="nav-item @if ($activePage == 'login') active @endif ">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="now-ui-icons users_circle-08"></i> {{ __("login") }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->