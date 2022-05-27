@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Gestión de alumnos</h1>
@stop
@section('content') 
    
        @if (auth()->user()->role_id == 1) <!-- Comprueba el rol del usuario logeado, si es superuser la columna ocupará menos para añadir el form -->
            <div class="col-md-9">
        @endif
        @if (auth()->user()->role_id == 2)
            <div class="col-md-12">
        @endif
        <div style="overflow-y: scroll; height: 400px">
            <table border="1" style="width: 100%; ">
                <tr>
                    <td class="cabecera"><b>ID</b></td>
                    <td class="cabecera"><b>DNI</b></td>
                    <td class="cabecera"><b>Nombre</b></td>
                    <td class="cabecera"><b>Apellidos</b></td>
                    <td class="cabecera"><b>Ciclo</b></td>
                    <td class="cabecera"><b>Accion</b></td>
                </tr>
                @foreach ($arrayAlumnos as $key => $a) <!-- Recorre cada alumno que recibe en la array -->
                    <tr>
                        <td style="padding: 10px">{{$a->id}}</td> <!-- Imprime cada campo del alumno -->
                        <td style="padding: 10px">{{$a->dni}}</td>
                        <td style="padding: 10px">{{$a->nombre}}</td>
                        <td style="padding: 10px">{{$a->apellidos}}</td>
                        <td style="padding: 10px">{{$a->ciclo}}</td>
                        <td style="padding: 10px"> <!-- Introduce enlaces a diferentes rutas pasando el id del alumno -->
                            <a href="{{route('showAlumno', $a->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/detalles.png" width="24px"/></a>
                            <a href="{{route('boletinNotas', $a->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/boletin.png" width="24px"/></a>
                            @if (auth()->user()->role_id == 1) <!-- Si el auth es superuser, permite borrar al alumno -->
                                <a href="{{route('destroyAlumno', $a->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/borrar.png" width="24px"/></a>
                            @endif</td>
                    </tr>
                @endforeach
            </table><br>
        </div>
        <a class="btn block mt-1 w-full" href="{{route('menu')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
    </div>
    @if (auth()->user()->role_id == 1) <!-- Si el auth es superuser, aparecerá un formulario en la vista para introducir alumnos -->
        <div class="col-md-3">
            <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Dar de alta alumnos</h1>
                <form class="mt-4" method="POST" action="{{ route('storeAlumno') }}">
                    @csrf
                    <div> <!-- El campo DNI se valida con JS -->
                        <x-jet-input placeholder="DNI" id="dni" class="block mt-1 w-full form-control" type="text" name="dni" :value="old('dni')" required autofocus autocomplete="dni" />
                    </div><br>

                    <div>
                        <x-jet-input placeholder="Nombre" id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
    
                    <div class="mt-4">
                        <x-jet-input  placeholder="Apellidos" id="apellidos" class="block mt-1 w-full form-control" type="apellidos" name="apellidos" :value="old('apellidos')" required />
                    </div><br>
    
                    <div>
                        <select name="ciclo" x-model="ciclo" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach ($arrayCiclos as $key => $c) <!-- Crea un select a partir de todos los ciclos de la BBDD -->
                                <option value="{{$c->nombre}}">{{$c->nombre}} -- {{$c->descripcion}}</option>
                            @endforeach
                        </select>
                    </div><br>
    
                    <input type="submit" id="enviar" class="btn block mt-1 w-full " style="background-color: rgb(255,103,1); color: white" name="Enviar" value="Enviar">
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
    <script src="{{ asset('js/dni.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop
