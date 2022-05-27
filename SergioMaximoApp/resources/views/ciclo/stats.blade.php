@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Estadisticas de ciclo</h1>
@stop
@section('content') 
<div class="col-md-12">
    <div class="accordion">
        <div class="card">
            <div class="card-header"> <!-- Imprime el nombre y descripcion del ciclo --> 
                <b>{{$ciclo->nombre}} - {{$ciclo->descripcion}}</b>
            </div>
        </div>
    </div>
    @foreach($arrayModulos as $key => $m) <!-- Recorre cada modulo del ciclo --> 
        @php //Crea las siguientes variables: 
            $contadorAlumnos = 0; //Cuenta los alumnos del módulo
            $aprobadosTotal = 0; //Cuenta los aprobados del módulo
            $suspendidosTotal = 0; //Cuenta los suspensos del módulo
        @endphp
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#{{$m->id}}" aria-expanded="true" aria-controls="collapseOne">
                    <div style="text-align: left">{{$m->nombre}}</div> <!-- Imprime el nombre del modulo -->
                  </button>
                </h2>
              </div>
              <div id="{{$m->id}}" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample"> <!-- Crea un div de id igual al modulo. Esto lo utilizamos para abrir y cerrar las pestañas de modulos -->
                <div class="card-body">
                    <table border="1" style="width: 100%">      
                        <tr>
                            <td class="cabecera"><b>Alumno</b></td>
                                @php
                                    $contadorUfs = 0; //Crea un contador para las UFs de cada modulo
                                @endphp
                            @foreach($arrayUfs as $u) <!-- Recorre cada UF del modulo -->
                                @if($u->modulo_id == $m->id)
                                    @php
                                        $contadorUfs = $contadorUfs + 1; //Por cada UF del modulo, suma uno al contador
                                    @endphp
                                    <td class="cabecera"><b>{{$u->nombre}} [{{$u->horas}} horas]</b></td> <!-- Imprime el nombre y horas de la UF. Esto será la cabecera de la tabla -->
                                @endif
                            @endforeach
                            <td class="cabecera"><b>Aprobado actual</b></td> 
                            <td class="cabecera"><b>Aprobado final</b></td>
                        </tr>
                        @foreach($arrayAlumnos as $key => $a) <!-- Recorre cada alumno del módulo -->
                            @if($m->ciclos->nombre == $a->ciclo)
                                <tr>
                                    <td>{{$a->nombre}} {{$a->apellidos}}</td> <!-- Imprime el nombre y apellidos del modulo -->
                                    @php //Creamos las siguentes variables
                                        $totalActual = 0; //Cuenta las UFs evaluadas del alumno
                                        $aprobadasActual = 0; //Cuenta las UFs aprobadas del alumno actualmente
                                        $aprobadasAlumno = 0; //Cuenta las UFs aprobadas del alumno en perspectiva de todo el curso
                                        $contadorAlumnos = $contadorAlumnos + 1; //Suma uno al contador de alumnos
                                    @endphp
                                    @foreach($a->ufs as $u) <!-- Recorre cada UF del alumno -->
                                        @if($u->modulo_id == $m->id) <!-- Comprueba que el modulo de la UF sea el mismo que el modulo que estamos recorriendo por cada itineracion -->
                                            @php 
                                                if($u->pivot->nota != 0){ //Si la nota es diferente a cero está evaluada y por lo tanto se suma al total actual
                                                    $totalActual++;
                                                }
                                                if($u->pivot->nota >= 5){ //Si la nota es mayor o igual a cinco el alumno está aprobado y se suma al total del curso
                                                    $aprobadasAlumno++;
                                                }
                                                if ($totalActual == 0) { //Si el total actual es igual a cero no calculamos el porcentaje de aprobado (así evitamos el error division by zero )
                                                    $aprobadasActual = @number_format(($aprobadasAlumno * 100 / 1));
                                                } else{ //En caso de ser mayor a cero calculamos el porcentaje aprobado actual de este modulo
                                                    $aprobadasActual = @number_format(($aprobadasAlumno * 100 / $totalActual ));
                                                }
                                            @endphp
                                            <td> 
                                                {{$u->pivot->nota}} <!-- Imprimimos las nota del alumno por cada UF de cada modulo -->
                                            </td>
                                        @endif
                                    @endforeach
                                    @php
                                        if (@number_format(($aprobadasAlumno * 100 / $contadorUfs)) >= 50) { //Comprobamos que el porcentaje de aprobado del alumno es mayor o igual a cincuenta (es decir, si ha aprobado el módulo)
                                            $aprobadosTotal++; //En caso afirmativo suma uno a los aprobados totales
                                        } else {
                                            $suspendidosTotal++; //En caso negativo suma uno a los supendidos totales
                                        }
                                    @endphp
                                    <td> 
                                        @php
                                            echo $aprobadasActual . "%"; //Muestra el porcentaje de aprobado del alumno en lo que lleva de modulo
                                        @endphp
                                    </td>
                                    <td> 
                                        @php 
                                            echo @number_format(($aprobadasAlumno * 100 / $contadorUfs)) . "%"; //Muestra el porcentaje de aprobado del alumno de todo el modulo
                                        @endphp
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
              </div> <!-- v Muestra el percentaje de aprobados y suspendidos del grupo de alumnos por cada modulo v -->
              <div style="text-align: right">@php echo "<b>Aprobados:</b> " . @number_format($aprobadosTotal * 100 / $contadorAlumnos) . "% <b>Suspendidos:</b> " . @number_format(($suspendidosTotal * 100 / $contadorAlumnos)) . "%" ; @endphp</div>
            </div>
          </div>
    @endforeach
    <a class="btn block mt-1 w-full" href="{{route('cicloIndex')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>
</div>
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop