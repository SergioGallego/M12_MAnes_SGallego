@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Detalles de alumno</h1>
@stop
@section('content') 
    <div class="col-md-12">
        <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/> <!-- Aquí se mostrarán los posibles errores de validacion -->
                <h3 style="text-align: center">Datos de alumno</h1>
                <form class="mt-4" method="POST" action="{{ route('updateAlumno', $alumno->id) }}">
                    @csrf
                    @method('PUT')
                    <div> <!-- Por cada input comprueba el rol de auth; si es profesor no podrá editar los datos -->
                        <input @if(auth()->user()->role_id == 2) readonly @endif value="{{$alumno->dni}}" placeholder="DNI" id="dni" class="block mt-1 w-full form-control" type="text" name="dni" required autofocus autocomplete="dni" />
                    </div><br>
                    <div>
                        <input @if(auth()->user()->role_id == 2) readonly @endif value="{{$alumno->nombre}}" placeholder="Nombre" id="name" class="block mt-1 w-full form-control" type="text" name="nombre" required autofocus autocomplete="name" />
                    </div>
                    <div class="mt-4">
                        <input @if(auth()->user()->role_id == 2) readonly @endif value="{{$alumno->apellidos}}" placeholder="Apellidos" id="apellidos" class="block mt-1 w-full form-control" type="text" name="apellidos" required />
                    </div><br>
                    <div>
                        <select @if(auth()->user()->role_id == 2) disabled @endif name="ciclo" x-model="ciclo" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach ($arrayCiclos as $key => $c) <!-- Crea un select a partir de todos los ciclos de la BBDD -->
                                <option @if($alumno->ciclo == $c->nombre) selected @endif value="{{$c->nombre}}">{{$c->nombre}} -- {{$c->descripcion}}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <a class="btn block mt-1 w-full" href="{{route('alumnoIndex')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
                    @if(auth()->user()->role_id == 1) <!-- Si el auth es superuser, permite enviar el formulario -->
                        <input type="submit" id="enviar" class="btn block mt-1 w-full " style="background-color: rgb(255,103,1); color: white" name="Enviar" value="Enviar">
                    @endif
                </form>
            </div>
    </div>
    <script src="{{ asset('js/dni.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop