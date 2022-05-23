@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Estadisticas de ciclo</h1>
@stop
@section('content') 
<div class="col-md-12">
    <div class="accordion">
        <div class="card">
            <div class="card-header">
                {{$ciclo->nombre}} - {{$ciclo->descripcion}}
            </div>
        </div>
    </div>
    @php
        $statsAlumno = array(array());
    @endphp
    @foreach($arrayModulos as $key => $m)
        @php
            $contadorAlumnos = 0;
            $aprobadosTotal = 0;
            $suspendidosTotal = 0;
        @endphp
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#{{$m->id}}" aria-expanded="true" aria-controls="collapseOne">
                    <div style="text-align: left">{{$m->nombre}}</div>
                  </button>
                </h2>
              </div>
              <div id="{{$m->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table border="1" style="width: 100%">      
                        <tr>
                            <td class="cabecera"><b>Alumno</b></td>
                                @php
                                    $contadorUfs = 0;
                                @endphp
                            @foreach($arrayUfs as $u)
                                @if($u->modulo_id == $m->id)
                                    @php
                                        $contadorUfs = $contadorUfs + 1;
                                    @endphp
                                    <td class="cabecera"><b>{{$u->nombre}} [{{$u->horas}} horas]</b></td>
                                @endif
                            @endforeach
                            <td class="cabecera"><b>Aprobado actual</b></td>
                            <td class="cabecera"><b>Aprobado final</b></td>
                        </tr>
                        @foreach($arrayAlumnos as $key => $a)
                            @if($m->ciclos->nombre == $a->ciclo)
                                <tr>
                                    <td>{{$a->nombre}} {{$a->apellidos}}</td>
                                    @php 
                                        $totalActual = 0;
                                        $aprobadasAlumno = 0;
                                        $contadorAlumnos = $contadorAlumnos + 1;
                                    @endphp
                                    @foreach($a->ufs as $u)
                                        @if($u->modulo_id == $m->id)
                                            @php 
                                                if(is_null($u->pivot->nota) == false){
                                                    $totalActual = $totalActual + 1;
                                                    
                                                }
                                                if($u->pivot->nota >= 5){
                                                    $aprobadasAlumno = $aprobadasAlumno + 1;
                                                }
                                            @endphp
                                            <td> 
                                                {{$u->pivot->nota}}
                                            </td>
                                        @endif
                                    @endforeach
                                    @php
                                        if (@number_format(($aprobadasAlumno * 100 / $contadorUfs)) >= 50) {
                                            $aprobadosTotal = $aprobadosTotal + 1;
                                        } else{
                                            $suspendidosTotal = $suspendidosTotal + 1;
                                        }
                                    @endphp
                                    <td> 
                                        @php 
                                            echo @number_format(($aprobadasAlumno * 100 / $totalActual)) . "%";
                                        @endphp
                                    </td>
                                    <td> 
                                        @php 
                                            echo @number_format(($aprobadasAlumno * 100 / $contadorUfs)) . "%";
                                        @endphp
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
              </div>
              <div style="text-align: right">@php echo "<b>Aprobados:</b> " . @number_format($aprobadosTotal * 100 / $contadorAlumnos) . "% <b>Suspendidos:</b> " . @number_format(($suspendidosTotal * 100 / $contadorAlumnos)) . "%" ; @endphp</div>
            </div>
          </div>
    @endforeach
</div>
@stop