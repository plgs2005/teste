<div class="sidebar" data-color="yellow">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="/home" class="simple-text logo-mini">
      {{ __('UC') }}
    </a>
    <a href="/home" class="simple-text logo-normal">
      {{ __('Users CRUD') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">

    <div class="user">
      <div class="photo">

        @if(auth()->user()->picture==null)

        <img style="max-height:100%; max-width:none; width:auto;" src="{{ auth()->user()->profilePicture() }}" />
        @else
        <img style="max-height:100%; max-width:none; width:auto;" src="{{ auth()->user()->picture }}" />
        @endif


      </div>
      <div class="info">
        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
          <span>
            {{ auth()->user()->name }}
            <b class="caret"></b>
          </span>
        </a>
        <div class="clearfix"></div>
        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <span class="sidebar-mini-icon">{{ __("MP") }}</span>
                <span class="sidebar-normal">{{ __("Meu Perfil") }}</span>
              </a>
            </li>

            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                <span class="sidebar-mini-icon">{{ __("SR") }}</span>
                <span class="sidebar-normal">{{ __("Sair") }}</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>


    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
          <i class="fab fa-laravel"></i>
          <p>
            {{ __("Usuários") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">

            <li class="@if ($activePage == 'Usuários') active @endif">
              <a href="{{ route('users.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Gerenciamento de usuários") }} </p>
              </a>
            </li>
          </ul>
        </div>

      </li>
    </ul>
  </div>
</div>