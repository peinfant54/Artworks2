@extends('templates.base')


@section('contenido')

    <div class="contenedor_login posicion_contenedor">

        <div class="titulo">
            <h1 class="titulo_galeria">@lang('index.ProyectTitle')</h1>
        </div>

        <div class="login">
            <h1 class="titulo_login">@lang('index.IndexLoginTitle')</h1>

            <form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <input id="username" type="text" class="input-txt" name="username" placeholder="@lang('index.IndexUsernamePlaceHolder')" value="{{ old('username') }}" required autofocus>

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">



                        <input id="password" type="password" class="input-txt" name="password" placeholder="@lang('index.IndexPasswordPlaceHolder')" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                </div>

                <div class="contrasena_btn">
                    <div><button type="submit"  class="btn">@lang('index.IndexButton')</button></div>
                    <div>
                        <a href="{{ route('password.request') }}" class="contrasena">
                            @lang('index.IndexForgot')
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
