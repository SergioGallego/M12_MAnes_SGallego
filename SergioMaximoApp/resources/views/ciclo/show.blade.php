@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Detalles de ciclo</h1>
@stop
@section('content') 
    <div class="col-md-12">
        <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Datos de ciclo</h1>
                    <form class="mt-4" method="POST" action="{{ route('updateCiclo', $ciclo->id) }}">
                        @csrf
                        @method('PUT')

                        <div> <!-- Si el auth es profesor, solo podrá ver los datos --> 
                            <input @if(auth()->user()->role_id == 2) readonly @endif value="{{$ciclo->nombre}}" placeholder="Nombre" id="nombre" class="block mt-1 w-full form-control" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="name" />
                        </div>
    
                        <div class="mt-4">
                            <input @if(auth()->user()->role_id == 2) readonly @endif value="{{$ciclo->descripcion}}" placeholder="Descripcion" id="descripcion" class="block mt-1 w-full form-control" type="text" name="descripcion" :value="old('descripcion')" required />
                        </div><br>

                        <a class="btn block mt-1 w-full" href="{{route('cicloIndex')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
                        @if(auth()->user()->role_id == 1) <!-- Si el auth es superusuario, podrá enviar los datos --> 
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