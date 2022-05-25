@extends('layouts.master')
@section('title')
    <h1 style="text-align: center"><b>Registro</b></h1>
@stop
@section('content')
<div style="margin-left: auto; margin-right: auto; display: block">
    <x-guest-layout>
            <img class="mb-3" src='https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/cropped-logo_calafell_favorit_icon_3.png' style="margin-right: auto; margin-left: auto; display: block">

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Olvidaste tu contraseña? Sin problemas. Introduce tu correo electrónico y te enviaremos un email con un enlace que te permitirá escoger una nueva.') }}
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button style="background-color: rgb(255,103,1); color: white">
                        {{ __('Reiniciar contraseña') }}
                    </x-jet-button>
                </div>
            </form>
    </x-guest-layout>
</div>
@stop