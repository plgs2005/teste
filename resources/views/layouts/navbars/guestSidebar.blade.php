<div class="sidebar" data-color="blue">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="/home" class="simple-text logo-mini">
      {{ __('UC') }}
    </a>
    <a href="/home" class="simple-text logo-normal">
      {{ __('USERs CRUD') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('login') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Login') }}</p>
        </a>
      </li>
      <li class="@if ($activePage == 'users') active @endif">
        <a href="{{ route('users.index') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p> {{ __("Visualizar de usuários") }} </p>
        </a>
      </li>

    </ul>
  </div>
</div>