@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Detalles de usuario</h1>
@stop
@section('content') 
    <div class="col-md-12">
        <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Datos de usuario</h1>
                <form class="mt-4" method="POST" action="{{ route('updateUser', $profesor->id) }}">
                    
                    @csrf
                    @method('PUT')
                    <!-- Para que pueda editar los campos hace las siguientes comprobaciones: -->
                    <!-- 1. Que el usuario se quiera editar a si mismo (si eres el usuario fundador o un profesor, solo puedes editar el nombre y el email) -->
                    <!-- 2. Un superusuario no puede editar a otro superusuario a menos que seas el fundador (existe una jerarquía de superusuarios)-->
                    <!-- 3. Un profesor no puede editar a otro profesor que no sea el mismo -->
                    <div> 
                        <input @if(auth()->user()->id != $profesor->id && auth()->user()->role_id == 2 || (auth()->user()->role_id == 1 && $profesor->role_id == 1 && auth()->user()->id != 1 && auth()->user()->id != $profesor->id)) readonly @endif value="{{$profesor->name}}" placeholder="Nombre" id="name" class="block mt-1 w-full form-control" type="text" name="name" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <input @if(auth()->user()->id != $profesor->id && auth()->user()->role_id == 2 || (auth()->user()->role_id == 1 && $profesor->role_id == 1 && auth()->user()->id != 1 && auth()->user()->id != $profesor->id)) readonly @endif value="{{$profesor->email}}" placeholder="Correo electrónico" id="email" class="block mt-1 w-full form-control" type="email" name="email" required />
                    </div><br>
                        <div>
                            <select @if(auth()->user()->role_id == 2 || (auth()->user()->role_id == 1 && $profesor->role_id == 1 && auth()->user()->id != 1 && auth()->user()->id != $profesor->id) || auth()->user()->id == 1 && $profesor->id == 1) style="display: none" @endif name="role_id" x-model="role_id" class="block mt-1 w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option @if($profesor->role_id == 1) selected @endif value="1">Superusuario</option>
                                <option @if($profesor->role_id == 2) selected @endif value="2">Profesor</option>
                            </select>
                        </div><br>

                        <div>
                            <select @if(auth()->user()->role_id == 2 || (auth()->user()->role_id == 1 && $profesor->role_id == 1 && auth()->user()->id != 1 && auth()->user()->id != $profesor->id) || auth()->user()->id == 1 && $profesor->id == 1) style="display: none" @endif value="{{$profesor->estado}}"  name="estado" x-model="estado" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option @if($profesor->estado == "Activo") selected @endif value="Activo">Activo</option>
                                <option @if($profesor->estado == "Inactivo") selected @endif value="Inactivo">Inactivo</option>
                            </select>
                        </div><br>
                        <a class="btn block mt-1 w-full" href="{{route('userIndex')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
                        <!-- Para enviar los campos sigue las mismas condiciones que al editarlos -->
                        @if(auth()->user()->id != $profesor->id && auth()->user()->role_id == 2 || (auth()->user()->role_id == 1 && $profesor->role_id == 1 && auth()->user()->id != 1 && auth()->user()->id != $profesor->id)) @else
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