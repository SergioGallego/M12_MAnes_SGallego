@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Gestión de usuarios</h1>
@stop
@section('content') 
    
        @if (auth()->user()->role_id == 1) <!-- Comprueba el rol del usuario logeado, si es superuser la columna ocupará menos para añadir el form -->
            <div class="col-md-9">
        @endif
        @if (auth()->user()->role_id == 2)
            <div class="col-md-12">
        @endif
        <table border="1" style="width: 100%">
            <tr>
                <td class="cabecera"><b>ID</b></td>
                <td class="cabecera"><b>Nombre</b></td>
                <td class="cabecera"><b>Email</b></td>
                <td class="cabecera"><b>Rol</b></td>
                <td class="cabecera"><b>Estado</b></td>
                <td class="cabecera"><b>Accion</b></td>
            </tr>
            @foreach ($arrayUsuarios as $key => $u) <!-- Recorre cada usuario -->
                <tr>
                    <td style="padding: 10px">{{$u->id}}</td> <!-- Imprime los datos de cada usuario -->
                    <td style="padding: 10px">{{$u->name}}</td>
                    <td style="padding: 10px">{{$u->email}}</td>
                    <td style="padding: 10px">{{$u->role_id}}</td>
                    <td style="padding: 10px">{{$u->estado}}</td>
                    <td style="padding: 10px">
                        <!-- Crea un enlace pasando la id del usuario -->
                        <a href="{{route('showUser', $u->id)}}" class="btn" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/detalles.png" width="24px"/></a>
                        @if (auth()->user()->role_id == 1) <!-- Si el auth es superuser, puede borrar al usuario -->
                            @if ($u->role_id == 2 || (auth()->user()->id == 1 && $u->id != 1)) <!-- El superusuario solo puede borrar al usuario si es profesor o si no es el superusuario fundador (el primer superusuario creado en la BBDD) -->
                                <a href="{{route('destroyUser', $u->id)}}"  class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/borrar.png" width="24px"/></a>
                            @endif
                        @endif</td>
                </tr>
            @endforeach
        </table><br>
        <a class="btn block mt-1 w-full" href="{{route('menu')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
    </div>
    @if (auth()->user()->role_id == 1) <!-- Si el auth es superusuario aparecerá un formulario para añadir usuarios a la BBDD -->
        <div class="col-md-3">
            <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Dar de alta usuarios</h1>
                <form class="mt-4" method="POST" action="{{ route('storeUser') }}">
                    @csrf
    
                    <div>
                        <x-jet-input placeholder="Nombre" id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                    <!-- Este campo valida si el email introducido es válido -->
                    <div class="mt-4">
                        <x-jet-input  placeholder="Correo electrónico" id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
                    </div>
    
                    <div class="mt-4">
                        <x-jet-input  placeholder="Contraseña" id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                    </div><br>
    
                    <div>
                        <select name="role_id" x-model="role_id" class="block mt-1 w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="1">Superusuario</option>
                            <option value="2">Profesor</option>
                        </select>
                    </div><br>
    
                    <div>
                        <select name="estado" x-model="estado" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div><br>
                    
                    <input class="btn" type="submit" id="enviar" name="Enviar"  style="background-color: rgb(255,103,1); color: white">
                </form>
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
            </div>
        </div>
    @endif
    <script src="{{ asset('js/index.js') }}" defer></script>
    <script src="{{ asset('js/email.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop