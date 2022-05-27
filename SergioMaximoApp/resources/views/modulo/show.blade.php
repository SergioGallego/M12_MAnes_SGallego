@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Detalles de módulo</h1>
@stop
@section('content') 
    <div class="col-md-12">
        <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Datos de modulo</h1>
                @if (isset($error) && $error==true) <!-- Si la vista recibe la variable error, significa el usuario ha cometido un error de validacion he imprime dicho error -->
                    <ul>
                        <div class="mb-4" style="color: red"><li>El modulo ya existe</li></div>
                    </ul>        
                @endif
                    <form class="mt-4" method="POST" action="{{ route('updateModulo', $modulo->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- Por cada input comprueba el rol de auth; si es profesor no podrá editar los datos -->
                        <div>
                            <input @if(auth()->user()->role_id == 2) readonly @endif value="{{$modulo->nombre}}" placeholder="Codigo" id="nombre" class="block mt-1 w-full form-control" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="name" />
                        </div>
    
                        <div class="mt-4">
                            <textarea @if(auth()->user()->role_id == 2) readonly @endif type="text" placeholder="Comentario" name="comentario" id="txtDescripcion" >{{$modulo->comentario}}</textarea> 
                        </div><br>
        
                        <div>
                            <select @if(auth()->user()->role_id == 2) disabled @endif name="profesor" x-model="profesor" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                @foreach ($arrayProfesores as $key => $p) <!-- Crea un select con todos los profesor de la BBDD -->
                                    <option @if($modulo->profesor == $p->id) selected @endif value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>
                        </div><br>
        
                        <div>
                            <select @if(auth()->user()->role_id == 2) disabled @endif name="ciclo" x-model="ciclo" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                @foreach ($arrayCiclos as $key => $c) <!-- Crea un select con todos los ciclos de la base de datos -->
                                    <option @if($modulo->ciclo == $c->id) selected @endif value="{{$c->id}}">{{$c->nombre}} -- {{$c->descripcion}}</option>
                                @endforeach
                            </select>
                        </div><br>
                        <a class="btn block mt-1 w-full" href="{{route('moduloIndex')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
                        @if(auth()->user()->role_id == 1) <!-- Si el auth es superusuario, permite enviar los datos -->
                            <x-jet-button class="btn block mt-1 w-full" style="background-color: rgb(255,103,1); color: white">
                                {{ __('Enviar') }}
                            </x-jet-button>
                        @endif
                </form>
            </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#txtDescripcion' ) )
            .catch( error => {
            console.error( error );
            } );
        </script>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop