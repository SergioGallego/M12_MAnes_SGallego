@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Gestión de módulos</h1>
@stop
@section('content') 
    
        @if (auth()->user()->role_id == 1)
            <div class="col-md-9">
        @endif
        @if (auth()->user()->role_id == 2)
            <div class="col-md-12">
        @endif
        <table border="1" style="width: 100%">
            <tr>
                <td class="cabecera"><b>ID</b></td>
                <td class="cabecera"><b>Nombre</b></td>
                <td class="cabecera"><b>Comentario</b></td>
                <td class="cabecera"><b>Profesor</b></td>
                <td class="cabecera"><b>Ciclo</b></td>
                <td class="cabecera"><b>Accion</b></td>
            </tr>
            @foreach ($arrayModulos as $key => $m)
                <tr>
                    <td style="padding: 10px">{{$m->id}}</td>
                    <td style="padding: 10px">{{$m->nombre}}</td>
                    <td style="padding: 10px">{{$m->comentario}}</td>
                    <td style="padding: 10px">{{$m->users->name}}</td>
                    <td style="padding: 10px">{{$m->ciclos->nombre}}</td>
                    <td style="padding: 10px"><a href="{{route('showModulo', $m->id)}}" style="color: #FF6701">Detalles...</a>
                        @if (auth()->user()->role_id == 1)
                            <a href="{{route('destroyModulo', $m->id)}}" style="color: #FF6701">Borrar...</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table><br>
        <a class="btn block mt-1 w-full" href="{{route('menu')}}" style="background-color: rgb(255,103,1); color: white">Tornar</a>
    </div>
    @if (auth()->user()->role_id == 1)
        <div class="col-md-3">
            <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Dar de alta módulos</h1>
                <form class="mt-4" method="POST" action="{{ route('storeModulo') }}">
                    @csrf
                    
                    <div>
                        <x-jet-input placeholder="Nombre" id="nombre" class="block mt-1 w-full form-control" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-input  placeholder="Comentario" id="comentario" class="block mt-1 w-full form-control" type="text" name="comentario" :value="old('comentario')" required />
                    </div><br>
    
                    <div>
                        <select name="profesor" x-model="profesor" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach ($arrayProfesores as $key => $p)
                                <option value="{{$p->id}}">{{$p->id}}</option>
                            @endforeach
                        </select>
                    </div><br>
    
                    <div>
                        <select name="ciclo" x-model="ciclo" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach ($arrayCiclos as $key => $c)
                                <option value="{{$c->id}}">{{$c->nombre}} -- {{$c->descripcion}}</option>
                            @endforeach
                        </select>
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
