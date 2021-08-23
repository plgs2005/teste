@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Perfil',
'activePage' => 'profile',
'activeNav' => '',
])
<style>
  hr.hrv {

    border: none;
    border-left: 1px solid hsla(500, 10%, 50%, 100);
    height: auto;
    width: 1px;
  }
</style>
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content justify-content-center">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5 class="title">{{__("Editar Perfil")}}</h5>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('profile.update') }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('alerts.success')
            <div class="row">
            </div>
            <div class="row ">

              <div class="col-md-6 pr-1 my-auto">
                <div class="form-group">
                  <label>{{__(" Nome")}}</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
                  @include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">{{__(" Email ")}}</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', auth()->user()->email) }}">
                  @include('alerts.feedback', ['field' => 'email'])
                </div>
              </div>
              <div class="col-md-6 pr-1  text-center justify-content-center">
                <h4 class="card-title">Avatar</h4>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                  <div class="fileinput-new thumbnail img-circle">
                    <img src="../../assets/img/placeholder.jpg" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                  <div>
                    <span class="btn btn-round btn-rose btn-file">
                      <span class="fileinput-new">Escolher Imagem</span>
                      <span class="fileinput-exists">Trocar</span>
                      <input type="file" name="image" id="image" />
                    </span>
                    <br />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 pr-1">

              </div>
            </div>
            <hr>
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary btn-round pull-center">{{__('Salvar Perfil')}}</button>
            </div>
            <hr class="half-rule" />
          </form>
        </div>
        <div class="card-header">
          <h5 class="title">{{__("Senha")}}</h5>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
            @csrf
            @method('put')
            @include('alerts.success', ['key' => 'password_status'])
            <div class="col-md-12 ">
            <div class="row justify-content-md-center">
            
              <div class="col-md-5 my-auto ">
                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                  <label>{{__("Senha")}}</label>
                  <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password" placeholder="{{ __('Senha') }}" type="password" required>
                  @include('alerts.feedback', ['field' => 'old_password'])
                </div>
              </div>
              <hr class="hrv ">
              <div class="col-md-5  ">
                <div class="row justify-content-md-center">
                  <div class="col-md-12 ">
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                      <label>{{__(" nova Senha")}}</label>
                      <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nova Senha') }}" type="password" name="password" required>
                      @include('alerts.feedback', ['field' => 'password'])
                    </div>
                  </div>
                </div>
                <div class="row justify-content-md-center">
                  <div class="col-md-12 ">
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                      <label>{{__(" Confirm a nova senha")}}</label>
                      <input class="form-control" placeholder="{{ __('Confirm a nova senha') }}" type="password" name="password_confirmation" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>


            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary btn-round ">{{__('Alterar Senha')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
        </div>
        <div class="card-body">
          <div class="author">
            <a>
              @if(auth()->user()->picture)

              <img class="avatar border-gray" src="{{ auth()->user()->picture }}" alt="...">
              @else
              <img class="avatar border-gray" src="{{ auth()->user()->profilePicture() }}" alt="...">
              @endif
              <h5 class="title">{{ auth()->user()->name }}</h5>
            </a>
            <p class="description">
              {{ auth()->user()->email }}
            </p>
          </div>
        </div>
        <hr>
        <div class="button-container">
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-facebook-square"></i>
          </button>
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-instagram"></i>
          </button>
          <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
            <i class="fab fa-linkedin"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection