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
    @foreach($m->ufs as $key => $u)
            {{$u->nombre}}
        @endforeach
    @foreach($arrayModulos as $key => $m)
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{$m->id}}" aria-expanded="true" aria-controls="collapseOne">
                    {{$m->nombre}}
                  </button>
                </h2>
              </div>
              <div id="{{$m->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table border="1" style="width: 100%">      
                        <tr>
                            <td class="cabecera"><b>Alumno</b></td>
                            @foreach($arrayUfs as $u)
                                <td class="cabecera"><b>{{$u->nombre}} [{{$u->horas}} horas]</b></td>
                            @endforeach
                        </tr>
                    </table>
                </div>
              </div>
            </div>
          </div>
    @endforeach
</div>
@stop