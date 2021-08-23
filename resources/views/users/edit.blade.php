@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Editar Usuário',
'activePage' => 'user',
'activeNav' => '',
])

@section('content')
<div class="panel-header">
</div>
<div class="content justify-content-center">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Gerenciamento de usuário') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('user.index') }}" class="btn btn-primary btn-round">{{ __('Voltar para lista') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <h6 class="heading-small text-muted mb-4">{{ __('Informações do Usuário') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="{{ old('name', $user->name) }}" required autofocus>

                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>


                            <h6 class="heading-small text-muted mb-4 mt-4">{{ __('Segurança') }}</h6>
                            <div class="pull-right">
                                <h6>
                                    <a href="{{ route('password.request') }}" class="link footer-link text-success"><i class="now-ui-icons arrows-1_refresh-69 spin"></i> {{ __('Esqueci a senha!') }}</a>
                                </h6>
                                
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-password">{{ __('Senha') }}</label>
                                <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">

                                @include('alerts.feedback', ['field' => 'password'])
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}" value="">
                            </div>



                            <div class="text-center ">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Salvar dados') }}</button>
                            </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection