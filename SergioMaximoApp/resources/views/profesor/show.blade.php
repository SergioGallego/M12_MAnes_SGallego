@extends('layouts.master')
@section('title')
    <h1 style="text-align: center">Gestión de datos</h1>
@stop
@section('content')
Show user {{$profesor->id}}
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop