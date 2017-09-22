@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="logoligin">
        <div class="col-md-12" align="center">
            <img class="image-responsive" alt="logo" id="logo" src="{{ asset('images/loginLogo.png')}}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center"><h4>Bem vindo ao Notes! (:</h4></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-5">
                                <label for="email" class="control-label">E-Mail</label>
                            </div>

                            <div class="col-md-6 col-md-offset-3">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-5">
                                <label for="password" class="control-label">Senha</label>
                            </div>

                            <div class="col-md-6 col-md-offset-3">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Esqueceu sua senha ?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <h5 align="center">Sistema de Requisições - Gestão e Eficiência</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
