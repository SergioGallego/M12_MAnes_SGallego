@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Gestión de datos</h1>
@stop
@section('content')
<div id="info2" class="col-md-4 p-3" style="display: none; height: 50%">
     <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" style="width: 80%">
          <div class="carousel-inner">
            <div class="carousel-item active" data-interval="1000">
              <img id="img1" src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="1000">
              <img id="img2" src="..." class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
</div>
<div class="col-md-3" style="margin-left: auto; margin-right: auto; display: block"> <!--col-md-9 col-md-3-->
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
    <div id="info" class="col-md-4 p-3" style="background-color: #ffe6cf; display: none; height: 50%">
       
    </div>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop