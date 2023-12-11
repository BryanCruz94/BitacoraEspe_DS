@extends('adminlte::page')

@section('title', 'UFA-ESPE')

@section('content_header')
    <div class="row justify-content-center align-item-center">
        <div class="col text-center">
        <h1>BITÁCORA DE NOVEDADES UFA ESPE-SD</h1>
        </div>
    </div>
    
@stop

@section('content')
    <div class="row">
        <div class="col ">
            <img class="img-fluid img-border img-round" src="{{ asset('vendor/adminlte/dist/img/fondo_santoDomingo.jpg') }}" alt="imagen santo domingo">
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
