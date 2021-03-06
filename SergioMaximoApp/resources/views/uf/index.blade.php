@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Gestión de ufs</h1>
@stop
@if(auth()->user()->id == $modulo->profesor || auth()->user()->role_id == 1) <!-- Comprueba que el auth sea el profesor de la UF o si es superusuario. En caso afirmativo, podrá ver el contenido de la UF -->
    @section('content') 
            @if (auth()->user()->role_id == 1) <!-- Comprueba el rol del usuario logeado, si es superuser la columna ocupará menos para añadir el form -->
                <div class="col-md-9">
            @endif
            @if (auth()->user()->role_id == 2)
                <div class="col-md-12">
            @endif
            <table border="1" style="width: 100%; overflow-y:scroll;"> <!-- Añadimos un scrollbar para las UFs -->
                <tr>
                    <td class="cabecera"><b>ID</b></td>
                    <td class="cabecera"><b>Nombre</b></td>
                    <td class="cabecera"><b>Profesor</b></td>
                    <td class="cabecera"><b>Modulo</b></td>
                    <td class="cabecera"><b>Horas</b></td>
                    <td class="cabecera"><b>Acciones</b></td>
                </tr>
                @foreach ($arrayUfs as $key => $u) <!-- Recorre todas las UFs del modulo -->
                    @if(auth()->user()->role_id == 1 || auth()->user()->id == $modulo->profesor)
                        <tr>
                            <td style="padding: 10px">{{$u->id}}</td> <!-- Imprime los datos de la UF -->
                            <td style="padding: 10px">{{$u->nombre}}</td>
                            @if ($modulo->profesor == null) <!-- Si la UF no tiene profesor, aparecerá Sin profesor -->
                                <td style="padding: 10px">Sin profesor</td>                               
                            @else
                                @foreach ($arrayProf as $key => $p)
                                    @if ($p->id == $modulo->profesor)
                                        <td style="padding: 10px">{{$p->name}}</td>                               
                                    @endif
                                @endforeach
                            @endif
                            <td style="padding: 10px">{{$u->modulo}}</td>
                            <td style="padding: 10px">{{$u->horas}}</td>
                            <td style="padding: 10px">
                                <!-- Crea enlaces con la id del modulo -->
                                <a href="{{route('showUf', $u->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/detalles.png" width="24px"/></a>
                                @if (auth()->user()->role_id == 1) <!-- Si el auth es superusuario, permite borrar la UF -->
                                    <a href="{{route('destroyUf', $u->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/borrar.png" width="24px"/></a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table><br>
            <a class="btn block mt-1 w-full"  href="{{ route('moduloIndex') }}" style="background-color: rgb(255,103,1); color: white">Volver</a>
        </div>
        @if (auth()->user()->role_id == 1) <!-- Si el auth es superusuario se mostrará un formulario para añadir UFs -->
            <div class="col-md-3">
                <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
                <x-jet-validation-errors class="mb-4" style="color: red"/>
                    <h3 style="text-align: center">Dar de alta ufs</h1>
                    @if (isset($error) && $error==true) <!-- Si la vista recibe un error, se mostrará lo siguiente y no se insertará la UF -->
                        <ul>
                            <div class="mb-4" style="color: red"><li>La uf ya existe</li></div>
                        </ul>        
                    @endif
                    <form class="mt-4" method="POST" action="{{ route('storeUf') }}">
                        @csrf
                        
                        <div>
                            <x-jet-input placeholder="Nombre" id="nombre" class="block mt-1 w-full form-control" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-jet-input placeholder="Horas" id="horas" class="block mt-1 w-full form-control" type="text" name="horas" :value="old('horas')" required />
                        </div>

                        <x-jet-input hidden id="modulo" type="text" name="modulo" value="{{$modulo->nombre}}"/> <!-- De forma ocultá, pasa a la vista el nombre y la id del modulo -->
                        <x-jet-input hidden id="modulo_id" type="text" name="modulo_id" value="{{$modulo->id}}"/>
        
                        <div>
                        </div><br>
        
                        <x-jet-button class="btn block mt-1 w-full " style="background-color: rgb(255,103,1); color: white">
                            {{ __('Enviar') }}
                        </x-jet-button>
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
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @stop
@else
    @section('content')
        <div class="col-md-12 text-center">
            <h1 class="text-danger">No tienes permisos para ver este contenido</h1>
        </div>
    @stop
@endif