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
                <tr>
                    <td class="cabecera"><b>Alumno</b></td>
                    @foreach($arrayUfs as $key => $u)
                        <td class="cabecera"><b>{{$u->nombre}}</b></td>
                    @endforeach
                </tr>
                @foreach($arrayAlumnos as $key => $a)
                    @if($modulo->ciclos->nombre == $a->ciclo)
                        <tr>
                            <td>{{$a->nombre}}</td>
                            @foreach($a->ufs as $u)
                                @if($u->modulo_id == $modulo->id)
                                    <td>
                                        <select name="notas[]" class="col-md-12" style="text-align: center">{{$u->pivot->nota}}
                                            <option value="1" @if ($u->pivot->nota == 1) selected @endif>1</option>  
                                            <option value="2" @if ($u->pivot->nota == 2) selected @endif>2</option>  
                                            <option value="3" @if ($u->pivot->nota == 3) selected @endif>3</option>        
                                            <option value="4" @if ($u->pivot->nota == 4) selected @endif>4</option>  
                                            <option value="5" @if ($u->pivot->nota == 5) selected @endif>5</option>  
                                            <option value="6" @if ($u->pivot->nota == 6) selected @endif>6</option>  
                                            <option value="7" @if ($u->pivot->nota == 7) selected @endif>7</option>  
                                            <option value="8" @if ($u->pivot->nota == 8) selected @endif>8</option>  
                                            <option value="9" @if ($u->pivot->nota == 9) selected @endif>9</option>  
                                            <option value="10" @if ($u->pivot->nota == 10) selected @endif>10</option>
                                        </select>
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endif
                @endforeach
                @if(auth()->user()->role_id == 1 || (auth()->user()->role_id == 2 && auth()->user()->id == $modulo->profesor))
                    <x-jet-button class="btn block mt-1 w-full" style="background-color: rgb(255,103,1); color: white">
                        {{ __('Guardar cambios') }}
                    </x-jet-button>
                @endif
            </form>
        </table><br>
        <a class="btn block mt-1 w-full" href="{{route('moduloIndex')}}" style="background-color: rgb(255,103,1); color: white">Volver</a>&nbsp
        

    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop
