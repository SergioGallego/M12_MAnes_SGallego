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
                @php //Crea las siguientes variables
                    $horasTotales = 0; //Cuenta las horas totales de cada modulo
                    $contador = 0; //Contador auxiliar para los alumnos sin notas
                    $contadorSinNotas = 0;  //Cuenta los alumnos que no tienen notas
                @endphp
                <tr>
                    <td class="cabecera"><b>Alumno</b></td>
                    @foreach($arrayUfs as $key => $u) <!-- Recorre cada UF del modulo -->
                        <td class="cabecera"><b>{{$u->nombre}}</b></td> <!-- Imprime el nombre de la UF -->
                        <td class="cabecera"><b>Horas</b></td>
                        @php 
                            $horasTotales += $u->horas; //Suma a las horas totales las horas de la UF
                        @endphp
                    @endforeach
                    <td class="cabecera"><b>Nota Final</b></td>
                    <td class="cabecera"><b>Horas cursadas</b></td>
                    <td class="cabecera"><b>Horas totales</b></td>
                </tr>
                @foreach($arrayAlumnos as $key => $a) <!-- Recorre cada alumno del modulo -->
                    @php //Crea las siguientes variables
                        $horasTotalesHechas = 0;  //Cuenta las horas totales hechas de cada alumno
                        $notaMedia = 0; //Guarda la nota media
                    @endphp
                    @if($modulo->ciclos->nombre == $a->ciclo) <!-- Comprueba que el ciclo que está cursando el alumno sea igual al nombre del ciclo que pertenece el modulo -->
                        <tr>
                            <td>{{$a->nombre}} {{$a->apellidos}}</td> <!-- Imprime el nombre y apellidos del alumno -->
                            @foreach($a->ufs as $u) <!-- Recorre cada UF del alumno -->
                                @if($u->modulo_id == $modulo->id) <!-- Comprueba que el modulo que pertenece la UF sea igual al modulo que recorre el bucle -->
                                    <td> 
                                        @if(auth()->user()->role_id == 2) <!-- Si el auth es profesor, crea un select editable para las notas -->
                                            <select name="notas[]" class="col-md-12" style="text-align: center"> <!-- Este select envía una array de notas -->
                                                <!-- El valor de cada opcion guarda la id del alumno, la id de la uf y la nota separados por '_'. Puedes ver como se utiliza en el controlador de notas -->
                                                <option value="{{$a->id . "_" . $u->id . "_0"}}" @if ($u->pivot->nota == 0) selected @endif>NE</option>  
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
                                            @if ($u->pivot->nota == 0) <!-- Si la nota es igual a cero, el alumno no esta evaluado (NE) -->
                                                NE
                                            @else <!-- En cualquier otro caso imprime la nota del alumno -->
                                                {{$u->pivot->nota}}
                                            @endif
                                        @endif
                                    </td>
                                    <td><b>{{$u->horas}}</b></td> <!-- Imprime las horas de la UF -->
                                    @php $notaMedia += $u->pivot->nota*$u->horas;@endphp <!-- Suma a la nota media el resultado de multiplicar la nota del alumno por las horas de la UF -->
                                    @if ($u->pivot->nota == 0) <!-- Si la nota es diferente a cero, se suman las horas a las horas hechas del alumno en ese modulo -->
                                    @else
                                        @php $horasTotalesHechas += $u->horas;@endphp
                                    @endif
                                @php
                                    $contador++; //Sumamos uno al contador auxiliar
                                @endphp
                                @endif
                            @endforeach
                            @foreach($arrayUfs as $key => $uf) <!-- Recorre cada UF del modulo -->
                            @if ($contador<=$contadorSinNotas) <!-- Comprueba si el contador auxiliar es menor o igual a los alumnos sin notas. Esto sirve para que la casilla sea editable aunque el alumno no tenga nota -->
                                <td>
                                    @if(auth()->user()->role_id == 2) <!-- Si el auth es profesor, permite editar la nota del alumno -->
                                    <select name="notas[]" class="col-md-12" style="text-align: center">
                                        <option value="{{$a->id . "_" . $uf->id . "_0"}}" selected>NE</option>  
                                        <option value="{{$a->id . "_" . $uf->id . "_1"}}">1</option>  
                                        <option value="{{$a->id . "_" . $uf->id . "_2"}}">2</option>  
                                        <option value="{{$a->id . "_" . $uf->id . "_3"}}">3</option>        
                                        <option value="{{$a->id . "_" . $uf->id . "_4"}}">4</option>  
                                        <option value="{{$a->id . "_" . $uf->id . "_5"}}">5</option>  
                                        <option value="{{$a->id . "_" . $uf->id . "_6"}}">6</option>  
                                        <option value="{{$a->id . "_" . $uf->id . "_7"}}">7</option>  
                                        <option value="{{$a->id . "_" . $uf->id . "_8"}}">8</option>  
                                        <option value="{{$a->id . "_" . $uf->id . "_9"}}">9</option>  
                                        <option value="{{$a->id . "_" . $uf->id . "_10"}}">10</option>
                                    </select>
                                    @else <!-- En cualquier otro caso, pondrá que no está evaluado al no tener nota -->
                                        NE
                                    @endif
                                </td>
                                <td><b>{{$uf->horas}}</b></td> <!-- Imprime las horas de la UF -->
                            @else
                                @php
                                    $contadorSinNotas++; //Suma uno al contador sin notas
                                @endphp
                            @endif
                            @endforeach
                            @if ($notaMedia == 0) <!-- Si la nota media es igual a cero, el alumno no ha sido evaluado -->
                                <td><b>NE</b></td>
                            @else <!-- En cualquier otro caso, calcula la nota media -->
                                <td><b>{{@number_format($notaMedia / $horasTotales)}}</b></td>
                            @endif
                            <td><b>{{$horasTotalesHechas}}</b></td> <!-- Finalmente, muestra las horas totales hechas del alumno y las horas totales de ese modulo -->
                            <td><b>{{$horasTotales}}</b></td>
                        </tr>
                    @endif
                @endforeach
            </table>
            <a class="btn block mt-1 w-full" href="{{route('moduloIndex')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>&nbsp
            @if(auth()->user()->role_id == 2 && auth()->user()->id == $modulo->profesor) <!-- Si el auth es profesor y es el profesor de ese modulo, puedes guardar los cambios en las notas -->
                    <x-jet-button class="btn block mt-1 w-full" style="background-color: rgb(255,103,1); color: white; float: left">
                        {{ __('Guardar cambios') }}
                    </x-jet-button>
                @endif
        </form><br>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop
