@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Boletín de notas del alumno</h1>
@stop
@section('content') 
    <div style="background-color: #ffe6cf" class="p-3 pr-5 d-flex justify-content-center col-md-12">
        <ul class="mt-5 mb-5">
            <h1>{{$alumno->nombre}} {{$alumno->apellidos}} - {{$alumno->ciclo}}</h1>  <!-- Imprime el nombre y apellidos del alumno -->
            @foreach ($arrayModulos as $key => $m)  <!-- Recorre cada modulo del alumno -->
                @php //Crea las siguientes variables
                    $horas = 0; //Guarda las horas de cada modulo
                    $notaMedia = 0; //Guarda la nota media del modulo
                @endphp
                @if ($alumno->ciclo == $m->ciclos->nombre)  <!-- Comprueba si el ciclo que esta apuntado el alumno es el mismo ciclo que el modulo de la itineracion -->
                    <li class="mb-3 mt-3">{{$m->nombre}} - @php echo htmlspecialchars_decode($m->comentario);@endphp</li>  <!-- Imprime el nombre del modulo -->
                        @foreach ($arrayUFs as $key => $u)  <!-- Recorre cada UF del modulo -->
                            @if ($u->modulo_id == $m->id) 
                                @foreach ($alumno->ufs as $uf)  <!-- Recorre cada nota del alumno de ese modulo -->
                                    @if($uf->id == $u->id)
                                        @php 
                                            $notaMedia += $uf->pivot->nota*$u->horas; //Suma a la nota media el siguiente calculo por UF
                                        @endphp
                                        <div class="mt-3 mb-3">
                                            <span>{{$u->nombre}} - Nota: {{$uf->pivot->nota}}</span><br>  <!-- Imprime el nombre de la UF y la nota del alumno -->
                                        </div>
                                    @endif
                                @endforeach
                                @php 
                                    $horas += $u->horas; //Suma a la variable las horas de la UF
                                @endphp
                            @endif
                            
                        @endforeach
                        <br>
                  
                        <b>Final:</b> {{@number_format($notaMedia / $horas)}}<br>  <!-- Imprime la siguiente formula que calcula la nota media del alumno de ese modulo -->
        
                        <hr color="black">
        
                        <br>
                @endif
            @endforeach  <!-- Crea dos rutas pasando la id del alumno -->
            <a class="btn block mt-3 w-full" href="{{route('alumnoIndex')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
            <a class="btn block mt-3 w-full" href="{{route('downloadNotas', $alumno->id)}}" style="background-color: rgb(255,103,1); color: white">Descargar</a>
            <a class="btn block mt-3 w-full" href="{{route('sendNotas', $alumno->id)}}" style="background-color: rgb(255,103,1); color: white">Enviar</a>
        </ul>
    </div>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop
