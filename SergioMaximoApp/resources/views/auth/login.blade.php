@extends('layouts.master')
@section('title')
    <h1 style="text-align: center">Login</h1>
@stop
@section('content')
    <div style="margin-right: auto; margin-left: auto; display: block" class="mt-5 mb-5">
        
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <img class="mb-3" src='https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/cropped-logo_calafell_favorit_icon_3.png' style="margin-right: auto; margin-left: auto; display: block">
        <x-jet-validation-errors class="mb-4" style="color: red"/>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email" value="{{ __('Email') }}" >
                <input placeholder="Correo electrónico" id="email" class="mt-1 form-control" style="width: 170%" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <label for="password" value="{{ __('Password') }}" >
                <input placeholder="Contraseña" id="password" class="mt-1 form-control" style="width: 170%"  type="password" name="password" required autocomplete="current-password" />
            </div>
            
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a style="color: rgb(255,103,1)" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <a style="color: rgb(255,103,1)" href="{{route('register')}}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                
                <button class="ml-4 btn" style="background-color: rgb(255,103,1); color: white">
                    {{ __('Acceder') }}
                </button>
            </div>
            <div class="mt-4">
                <a href="{{ url('authorized/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="">
                </a>
            </div>
        </form>
    </div>
@stop