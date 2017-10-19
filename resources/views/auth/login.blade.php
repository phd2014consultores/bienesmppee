@extends('layout')

@section('content')
    <div class="phd-login phd-fixed demo-card-wide mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Acceso</h2>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="mdl-card__supporting-text phd-align_center">
                <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
                    <label class="mdl-textfield__label" for="username">Usuario</label>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('usernanem') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="phd-input-out phd-is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input @focus="setIsFocused" onblur="removeIsFocusedImpl(this)" class="mdl-textfield__input" type="password" id="password" name="password" required>
                    <label class="mdl-textfield__label" for="password">Contraseña</label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <div class="phd-buttons-form">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        Iniciar sesión
                    </button>

                </div>
            </div>
        </form>
    </div>
@endsection
