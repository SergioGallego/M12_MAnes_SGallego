@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Gestión de módulos</h1>
@stop
@section('content') 
    
        @if (auth()->user()->role_id == 1) <!-- Comprueba el rol del usuario logeado, si es superuser la columna ocupará menos para añadir el form -->
            <div class="col-md-9">
        @endif
        @if (auth()->user()->role_id == 2)
            <div class="col-md-12">
        @endif
        <div style="overflow-y: scroll; height: 400px">
            <table border="1" style="width: 100%;">
                <tr>
                    <td class="cabecera"><b>ID</b></td>
                    <td class="cabecera"><b>Nombre</b></td>
                    <td class="cabecera"><b>Comentario</b></td>
                    <td class="cabecera"><b>Profesor</b></td>
                    <td class="cabecera"><b>Ciclo</b></td>
                    <td class="cabecera"><b>Accion</b></td>
                </tr>
                @foreach ($arrayModulos as $key => $m) <!-- Recorre cada modulo -->
                    @if(auth()->user()->role_id == 1 || auth()->user()->id == $m->profesor) <!-- Comprueba que el usuario conectado es el profesor de ese modulo o un superusuario. En caso afirmativo muestra el contenido -->
                        <tr>
                            <td style="padding: 10px">{{$m->id}}</td> <!-- Imprimes los datos de cada modulo -->
                            <td style="padding: 10px">{{$m->nombre}}</td>
                            <td style="padding: 10px">@php echo htmlspecialchars_decode($m->comentario);@endphp</td>
                            @if ($m->profesor == null) <!-- Si el modulo no tiene profesor, aparecerá Sin profesor -->
                                <td style="padding: 10px">Sin profesor</td>
                            @else
                                <td style="padding: 10px">{{$m->users->name}}</td> <!-- En otro caso imprime el nombre del profesor -->
                            @endif
                            <td style="padding: 10px">{{$m->ciclos->nombre}}</td> <!-- Imprime el nombre del ciclo que pertenece a ese modulo -->
                            <td style="padding: 10px"> <!-- Añade un enlace a las siguientes rutas pasando el id del modulo -->
                                <a href="{{route('showModulo', $m->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/detalles.png" width="24px"/></a>
                                <a href="{{route('showNotas', $m->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/notas.png" width="24px"/></a>
                                <a href="{{route('ufIndex', $m->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/uf.png" width="24px"/></a>
                                @if (auth()->user()->role_id == 1) <!-- Si el auth es superusuario, permite borrar el modulo -->
                                    <a href="{{route('destroyModulo', $m->id)}}" class="btn" style="color: white; background-color: #FF6701"><img src="https://raw.githubusercontent.com/SergioGallego/M12_MAnes_SGallego/main/icon/borrar.png" width="24px"/></a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table><br>
        </div>
        <a class="btn block mt-1 w-full" href="{{route('menu')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
    </div>
    @if (auth()->user()->role_id == 1) <!-- Si el auth es superusuario, aparecerá un formulario para añadir modulos -->
        <div class="col-md-3">
            <div class="botones p-3" style="border-width: 1px; background-color: #ffe6cf">
            <x-jet-validation-errors class="mb-4" style="color: red"/>
                <h3 style="text-align: center">Dar de alta módulos</h1>
                @if (isset($error) && $error==true) <!-- Si la vista recibe la variable error, significa el usuario ha cometido un error de validacion he imprime dicho error -->
                    <ul>
                        <div class="mb-4" style="color: red"><li>El modulo ya existe</li></div>
                    </ul>        
                @endif
                <form class="mt-4" method="POST" action="{{ route('storeModulo') }}">
                    @csrf
                    
                    <div>
                        <x-jet-input placeholder="Codigo" id="nombre" class="block mt-1 w-full form-control" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <textarea type="text" placeholder="Comentario" name="comentario" id="txtDescripcion" :value="old('comentario')" ></textarea> 
                    </div><br>
    
                    <div>
                        <select name="profesor" x-model="profesor" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach ($arrayProfesores as $key => $p) <!-- Crea un select con todos los profesor de la BBDD -->
                                <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div><br>
    
                    <div>
                        <select name="ciclo" x-model="ciclo" class="block mt-1  w-full form-control border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach ($arrayCiclos as $key => $c) <!-- Crea un select con todos los ciclos de la base de datos -->
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
