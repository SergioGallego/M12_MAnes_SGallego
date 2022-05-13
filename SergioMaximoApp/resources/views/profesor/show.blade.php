@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Gestión de usuarios</h1>
@stop
@section('content') 
    <div class="col-md-12">
        <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Datos de usuario</h1>
                <form class="mt-4" method="POST" action="{{ route('updateUser') }}">
                    @csrf
                    @method('PUT')
                    <div>
                        <input @if(auth()->user()->id != $profesor->id && auth()->user()->role_id == 2 || (auth()->user()->role_id == 1 && $profesor->role_id == 1)) readonly @endif value="{{$profesor->name}}" placeholder="Nombre" id="name" class="block mt-1 w-full form-control" type="text" name="name" required autofocus autocomplete="name" />
                    </div>
    
                    <div class="mt-4">
                        <input value="{{$profesor->email}}" placeholder="Correo electrónico" id="email" class="block mt-1 w-full form-control" type="email" name="email" required />
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
                    <x-jet-button class="btn block mt-1 w-full " style="background-color: rgb(255,103,1); color: white">
                        {{ __('Enviar') }}
                    </x-jet-button>
                </form>
            </div>
    </div>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop