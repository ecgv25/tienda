@extends('layouts.auth')

@section('script_additional')

@endsection

@section('content')
    <div class="card-body">
        <form class="floating-labels" id="loginform" action="{{ route('login') }}" method="POST">
            @csrf

            @include('auth.partials.logo')


                <div class="col-xs-12">
                    <h3>{{ __('Login') }}</h3>
                </div>


            <div class="form-group m-t-40{{ $errors->has('correo') ? ' has-danger has-error' : '' }}">
                <input id="correo" type="email" class="form-control{{ $errors->has('correo') ? ' form-control-danger' : '' }}" name="correo" value="{{ old('correo') }}" required autofocus>
                <span class="bar"></span>
                <label for="correo"><span  class="input-group-addon"><i class="fa fa-envelope "></i></span>{{ __('E-Mail Address') }}</label>

                @if ($errors->has('correo'))
                <div class="form-control-feedback">
                    <small>{{ $errors->first('correo') }}</small>
                </div>
                @endif
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                <span class="bar"></span>
                <label for="password"><span  class="input-group-addon"><i class="fa fa-lock "></i></span>{{ __('Password') }}</label>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    {{--<div class="checkbox checkbox-primary float-left p-t-0">--}}
                        {{-- <input id="checkbox-signup" type="checkbox" class="filled-in chk-col-light-blue"> --}}
                        {{--<input class="filled-in chk-col-light-blue" type="checkbox" name="remember" id="checkbox-signup" {{ old('remember') ? 'checked' : '' }}>
                        <label for="checkbox-signup">
                            {{ __('Remember Me') }}
                        </label>
                    </div>--}}
                    <a href="{{ route('password.request') }}" class="text-muted float-right m-t-10">
                        <i class="fa fa-lock m-r-5"></i>
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-block text-uppercase btn-rounded" type="submit">{{ __('Login') }}</button>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    {{ __('Dont have an account?') }} <a href="{{ route('register') }}" class="text-primary m-l-5"><b>{{ __('Register') }}</b></a>
                </div>
            </div>
            @captcha
        </form>
    </div>
@endsection