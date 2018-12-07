@extends('admin/layouts/admin')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home') }}">Wealthman</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Авторизация</p>

        <form action="{{ route('admin.login') }}" method="POST">
            {{ csrf_field() }}

            @if (session('authError'))
                <div class="form-group has-error">
                    <span class="help-block">{{ session('authError') }}</span>
                </div>
            @endif

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input class="form-control" name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <input class="form-control" name="password" type="password" placeholder="Пароль">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label class="">
                            <input class="js-icheck" id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }} >
                            Запомнить
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Войти</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection