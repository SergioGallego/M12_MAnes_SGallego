@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Gestión de usuarios</h1>
@stop
@section('content') 
    <div class="col-md-12">
        <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Datos de alumnbo</h1>
                <form class="mt-4" method="POST" action="{{ route('updateAlumno', $alumno->id) }}">
                    
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <input @if(auth()->user()->role_id == 2) readonly @endif value="{{$alumno->nombre}}" placeholder="Nombre" id="name" class="block mt-1 w-full form-control" type="text" name="nombre" required autofocus autocomplete="name" />
                    </div>
                    <div class="mt-4">
                        <input @if(auth()->user()->role_id == 2) readonly @endif value="{{$alumno->apellidos}}" placeholder="Apellidos" id="apellidos" class="block mt-1 w-full form-control" type="text" name="apellidos" required />
                    </div><br>
                    <div>
                        <select @if(auth()->user()->role_id == 2) disabled @endif name="ciclo" x-model="ciclo" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach ($arrayCiclos as $key => $c)
                                <option @if($alumno->ciclo == $c->nombre) selected @endif value="{{$c->nombre}}">{{$c->nombre}} -- {{$c->descripcion}}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <a class="btn block mt-1 w-full" href="{{route('alumnoIndex')}}" style="background-color: rgb(255,103,1); color: white">Tornar</a>
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