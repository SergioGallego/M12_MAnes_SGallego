@extends('layouts.master')
@section('title')
    <h1 style="text-align: center">Gestión de datos</h1>
@stop
@section('content')
Index Ciclo
    <div id="info" class="col-md-8 p-3" style="background-color: white; border-style: solid; border-color: gray; display: none"></div>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop
