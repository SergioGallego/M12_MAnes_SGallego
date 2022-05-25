@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Boletín de notas del alumno</h1>
@stop
@section('content') 
    <div style="background-color: #ffe6cf" class="p-3 pr-5 d-flex justify-content-center col-md-12">
        <ul class="mt-5 mb-5">
            <h1>{{$alumno->nombre}} {{$alumno->apellidos}} - {{$alumno->ciclo}}</h1>
            @foreach ($arrayModulos as $key => $m)
                @php
                    $horas = 0;
                    $notaMedia = 0;
                @endphp
                @if ($alumno->ciclo == $m->ciclos->nombre)
                    <li class="mb-3 mt-3">{{$m->nombre}} - {{$m->comentario}}</li>
                        @foreach ($arrayUFs as $key => $u)
                            @if ($u->modulo_id == $m->id)
                                @foreach ($alumno->ufs as $uf)
                                    @if($uf->id == $u->id)
                                        @php 
                                            $notaMedia += $uf->pivot->nota*$u->horas;
                                        @endphp
                                        <div class="mt-3 mb-3">
                                            <span>{{$u->nombre}} - Nota: {{$uf->pivot->nota}}</span><br>
                                        </div>
                                    @endif
                                @endforeach
                                @php 
                                    $horas += $u->horas;
                                @endphp
                            @endif
                            
                        @endforeach
                        <br>
                  
                        <b>Final:</b> {{@number_format($notaMedia / $horas)}}<br>
        
                        <hr color="black">
        
                        <br>
                @endif
            @endforeach
            <a class="btn block mt-3 w-full" href="{{route('alumnoIndex')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
            <a class="btn block mt-3 w-full" href="{{route('downloadNotas', $alumno->id)}}" style="background-color: rgb(255,103,1); color: white">Descargar</a>
            <a class="btn block mt-3 w-full" href="{{route('sendNotas', $alumno->id)}}" style="background-color: rgb(255,103,1); color: white">Enviar</a>
        </ul>
    </div>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop
