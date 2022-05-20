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
                            @foreach($m->ufs as $key => $u)
                                <td class="cabecera"><b>{{$u->nombre}} [{{$u->horas}} horas]</b></td>
                            @endforeach
                        </tr>
                        @foreach($arrayAlumnos as $key => $a)
                            @if($modulo->ciclos->nombre == $a->ciclo)
                                <tr>
                                    <td>{{$a->nombre}} {{$a->apellidos}}</td>
                                    @foreach($a->ufs as $u)
                                        @if($u->modulo_id == $modulo->id)
                                            <td> 
                                                @if(auth()->user()->role_id == 2)
                                                    <select name="notas[]" class="col-md-12" style="text-align: center">{{$u->pivot->nota}}
                                                        <option value="{{$a->id . "_" . $u->id . "_1"}}" @if ($u->pivot->nota == 1) selected @endif>1</option>  
                                                        <option value="{{$a->id . "_" . $u->id . "_2"}}" @if ($u->pivot->nota == 2) selected @endif>2</option>  
                                                        <option value="{{$a->id . "_" . $u->id . "_3"}}" @if ($u->pivot->nota == 3) selected @endif>3</option>        
                                                        <option value="{{$a->id . "_" . $u->id . "_4"}}" @if ($u->pivot->nota == 4) selected @endif>4</option>  
                                                        <option value="{{$a->id . "_" . $u->id . "_5"}}" @if ($u->pivot->nota == 5) selected @endif>5</option>  
                                                        <option value="{{$a->id . "_" . $u->id . "_6"}}" @if ($u->pivot->nota == 6) selected @endif>6</option>  
                                                        <option value="{{$a->id . "_" . $u->id . "_7"}}" @if ($u->pivot->nota == 7) selected @endif>7</option>  
                                                        <option value="{{$a->id . "_" . $u->id . "_8"}}" @if ($u->pivot->nota == 8) selected @endif>8</option>  
                                                        <option value="{{$a->id . "_" . $u->id . "_9"}}" @if ($u->pivot->nota == 9) selected @endif>9</option>  
                                                        <option value="{{$a->id . "_" . $u->id . "_10"}}" @if ($u->pivot->nota == 10) selected @endif>10</option>
                                                    </select>
                                                @else
                                                    {{$u->pivot->nota}}
                                                @endif
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
              </div>
            </div>
          </div>
    @endforeach
</div>
@stop