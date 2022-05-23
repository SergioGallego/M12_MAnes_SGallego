@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Notas de alumnos</h1>
@stop
@section('content')
        <table border="1" style="width: 100%">
            <form method="POST" action="{{ route('updateNotas') }}">
                @csrf
                @method('PUT')        
                <?php $horasTotales = 0; $notaMedia = 0; $contador = 0; $horasTotalesHechas = 0;?>
                <tr>
                    <td class="cabecera"><b>Alumno</b></td>
                    @foreach($arrayUfs as $key => $u)
                        <td class="cabecera"><b>{{$u->nombre}}</b></td>
                        <td class="cabecera"><b>Horas</b></td>
                    @endforeach
                    <td class="cabecera"><b>Nota Final</b></td>
                    <td class="cabecera"><b>Horas totales</b></td>
                </tr>
                @foreach($arrayAlumnos as $key => $a)
                    @if($modulo->ciclos->nombre == $a->ciclo)
                        <tr>
                            <td>{{$a->nombre}} {{$a->apellidos}}</td>
                            @foreach($a->ufs as $u)
                                @if($u->modulo_id == $modulo->id)
                                    <td> 
                                        @if(auth()->user()->role_id == 2)
                                            <select name="notas[]" class="col-md-12" style="text-align: center">
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
                                    <td><b>{{$u->horas}}</b></td>
                                    <?php $notaMedia += $u->pivot->nota*$u->horas; $contador++;?>
                                    <?php $horasTotales += $u->horas; ?>
                                    @if ($u->pivot->nota == NULL)
                                    @else
                                        <?php $horasTotalesHechas += $u->horas; ?>
                                    @endif
                                @endif
                            @endforeach
                            <td><b>{{($notaMedia / $horasTotales)}}</b></td>
                            <td><b>{{$horasTotalesHechas}}</b></td>
                        </tr>
                    @endif
                @endforeach
            </table>
            @if(auth()->user()->role_id == 1 || (auth()->user()->role_id == 2 && auth()->user()->id == $modulo->profesor))
            <a class="btn block mt-1 w-full" href="{{route('moduloIndex')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>&nbsp
                    <x-jet-button class="btn block mt-1 w-full" style="background-color: rgb(255,103,1); color: white; float: left">
                        {{ __('Guardar cambios') }}
                    </x-jet-button>
                @endif
        </form><br>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop
