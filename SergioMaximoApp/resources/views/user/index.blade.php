@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Gestión de datos</h1>
@stop
@section('content')
<div class="col-md-4"> <!--col-md-9 col-md-3-->
     <div class="row m-2 mb-5 mt-3">
        <a id="alumno" href="{{ route('alumnoIndex') }}"  class="btn pt-3 pb-3 botones">
             <b>Alumno</b>
        </a>
     </div>
     <div class="row m-2 mb-5 mt-5">
         <a id="usuario" href="{{ route('userIndex') }}" class="btn pt-3 pb-3 botones">
              <b>Usuario</b>
         </a>
      </div>
      <div class="row m-2 mb-5 mt-5">
         <a id="ciclo" href="{{ route('cicloIndex') }}" class="btn pt-3 pb-3 botones">
              <b>Ciclo</b>
         </a>
      </div>
      <div class="row m-2 mb-3 mt-5">
         <a id="modulo"  href="{{ route('moduloIndex') }}" class="btn pt-3 pb-3 botones">
              <b>Modulo</b>
         </a>
      </div>
     </div>
    <div id="info" class="col-md-4 p-3" style="background-color: white; border-style: solid; border-color: gray; display: none; height: 50%">
       
    </div>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop