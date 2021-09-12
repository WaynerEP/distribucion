@extends('layouts.appAuth')

@section('main')
    <h2 class="">{{ __('Iniciar Sesión en') }} <a href="#"><span class="brand-name">A'MU</span></a></h2>
    <p class="signup-link">Ingrese sus datos</p>
    {{-- <p class="signup-link">Ingrese sus datos <a href="{{ route('register') }}">Create an account</a></p> --}}

    <form class="text-left" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form">

            <div id="username-field" class="field-wrapper input">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Ingrese usuario" name="email" value="{{ old('email') }}" required autocomplete="email"
                    autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div id="password-field" class="field-wrapper input mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-lock">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <input id="passwordd" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Ingrese password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-sm-flex justify-content-between mt-3">
                <div class="field-wrapper toggle-pass">
                    <label class="new-control new-checkbox checkbox-outline-primary">
                        <input type="checkbox" name="remember" id="toggle-password"
                        {{ old('remember') ? 'checked' : '' }} class="new-control-input">
                        <span class="new-control-indicator"></span>Keep me logged in
                      </label>
                </div>
                <div class="field-wrapper">
                    <button type="submit" class="btn btn-primary" value="">{{ __('Iniciar Sesión') }}</button>
                </div>
            </div>


            <div class="field-wrapper mt-3">
                @if (Route::has('password.request'))
                    <a class="forgot-pass-link" href="{{ route('password.request') }}">
                        {{ __('Olvidastes tu contraseña?') }}
                    </a>
                @endif
            </div>

        </div>
    </form>



@endsection
