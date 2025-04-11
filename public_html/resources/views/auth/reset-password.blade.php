@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', __('Restablecer Contraseña'))

@section('auth_body')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        {{-- Token field --}}
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ $request->email ?? old('email') }}" placeholder="{{ __('Email') }}" readonly>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('Nueva contraseña') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password confirmation field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control"
                   placeholder="{{ __('Confirmar nueva contraseña') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        {{-- Reset password button --}}
        <button type="submit" class="btn btn-primary btn-block">
            {{ __('Restablecer contraseña') }}
        </button>
    </form>
@stop
