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
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
