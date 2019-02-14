@extends('layouts.app')

@section('content')
    @include('layouts/header')
    <div class="content modal-page">
        <div class="container">
            <div class="modal-topic">
                @include('components/breadcrumbs', [
                    'theme' => 'dark-theme',
                    'breadcrumbs' => [[
                        'name' => 'Home',
                        'link' => route('home'),
                    ],[
                        'name' => 'Sign In',
                    ]]
                ])
            </div>
            <div class="modal-inline">
                <h1 class="page-header">Sign In</h1>
                <div class="modal">
                    <div class="auth-modal__tabs">
                        <span class="auth-modal__tabs-link active">Sign In</span>
                        <a class="auth-modal__tabs-link" href="{{ route('register') }}">Sign Up</a>
                    </div>
                    <div class="modal-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="button button_blue">Log In</button>
                            <div class="modal-form__links">
                                <a class="modal-form__forgot-password" href="{{route('password.forgot')}}">Forgot password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/footer')
@endsection
