@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Detalles de uf</h1>
@stop
@section('content') 
    <div class="col-md-12">
        <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Datos de modulo</h1>
                @if (isset($error) && $error==true)
                    <ul>
                        <div class="mb-4" style="color: red"><li>La uf ya existe</li></div>
                    </ul>        
                @endif
                    <form class="mt-4" method="POST" action="{{ route('updateUf', $uf->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <input @if(auth()->user()->role_id == 2) readonly @endif value="{{$uf->nombre}}" placeholder="Nombre" id="nombre" class="block mt-1 w-full form-control" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="name" />
                        </div>
    
                        <div class="mt-4">
                            <input @if(auth()->user()->role_id == 2) readonly @endif value="{{$uf->horas}}" placeholder="Horas" id="horas" class="block mt-1 w-full form-control" type="text" name="horas" :value="old('horas')" required />
                        </div>
        
                        <div class="mt-4">
                            <input readonly value="{{$uf->modulo}}" placeholder="Modulo" id="moduloNombre" class="block mt-1 w-full form-control" type="text" name="modulo" :value="old('modulo')" required />
                        </div>

                        <div class="mt-4">
                            <input readonly value="{{$uf->modulo_id}}" placeholder="Modulo id" id="modulo_id" class="block mt-1 w-full form-control" type="text" name="modulo_id" :value="old('modulo_id')" required />
                        </div><br>

                        <a class="btn block mt-1 w-full" href="{{route('moduloIndex')}}" style="background-color: rgb(255,103,1); color: white">Tornar</a>
                        @if(auth()->user()->role_id == 1)
                            <x-jet-button class="btn block mt-1 w-full" style="background-color: rgb(255,103,1); color: white">
                                {{ __('Enviar') }}
                            </x-jet-button>
                        @endif
                </form>
            </div>
    </div>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop