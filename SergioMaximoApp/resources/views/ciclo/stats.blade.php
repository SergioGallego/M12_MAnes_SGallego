@extends('layouts.master')
@include('partials.navbar')
@section('title')
    <h1 style="text-align: center">Detalles de ciclo</h1>
@stop
@section('content') 
    stats
    <script src="{{ asset('js/index.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@stop