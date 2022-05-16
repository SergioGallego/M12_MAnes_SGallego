@extends('layouts.master')
@section('title')
    <h1 style="text-align: center">Registro</h1>
@stop
@section('content')
    <div style="margin-right: auto; margin-left: auto; display: block" class="mt-5 mb-5">
            <img class="mb-3" src='https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/cropped-logo_calafell_favorit_icon_3.png' style="margin-right: auto; margin-left: auto; display: block">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-jet-input placeholder="Nombre" id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-input  placeholder="Correo electrónico" id="email" pattern="[a-z\_\-\.\0-9]{1,64}@inscamidemar.cat" title="Solamente se permiten cuentas de inscamidemar" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-input  placeholder="Contraseña" id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-input placeholder="Confirmar contraseña" id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div><br>

                <div>
                    <select name="role_id" x-model="role_id" class="block mt-1 w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="1">Superusuario</option>
                        <option selected value="2">Profesor</option>
                    </select>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" style="color: rgb(255,103,1)" href="{{ route('login') }}">
                        {{ __('Ya te has registrado?') }}
                    </a>

                    <x-jet-button class="ml-4 btn" style="background-color: rgb(255,103,1); color: white">
                        {{ __('Registrar') }}
                    </x-jet-button>
                </div>
            </form>
    </div>
@stop
