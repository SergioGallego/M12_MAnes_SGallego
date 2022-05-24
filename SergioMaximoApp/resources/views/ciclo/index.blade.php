@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Gestión de ciclos</h1>
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
                <td class="cabecera"><b>Descripcion</b></td>
                <td class="cabecera"><b>Acción</b></td>
            </tr>
            @foreach ($arrayCiclos as $key => $c)
                <tr>
                    <td style="padding: 10px">{{$c->id}}</td>
                    <td style="padding: 10px">{{$c->nombre}}</td>
                    <td style="padding: 10px">{{$c->descripcion}}</td>
                    <td style="padding: 10px"><a href="{{route('showCiclo', $c->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/detalles.png" width="24px"/></a>
                        <a href="{{route('statsCiclo', $c->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/stats.png" width="24px"/></a>
                        @if (auth()->user()->role_id == 1)
                            <a href="{{route('destroyCiclo', $c->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/borrar.png" width="24px"/></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table><br>
        <a class="btn block mt-1 w-full" href="{{route('menu')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
    </div>
    @if (auth()->user()->role_id == 1)
        <div class="col-md-3">
            <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Dar de alta ciclos</h1>
                <form class="mt-4" method="POST" action="{{ route('storeCiclo') }}">
                    @csrf
                    
                    <div>
                        <x-jet-input placeholder="Nombre" id="nombre" class="block mt-1 w-full form-control" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-input  placeholder="Descripcion" id="descripcion" class="block mt-1 w-full form-control" type="text" name="descripcion" :value="old('descripcion')" required />
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
