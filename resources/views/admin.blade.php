@extends('adminlte::page')

@section('title', 'ADMINISTRADOR')

@section('content_header')
<div class="row justify-content-center align-items-center bg-white text-center" >
    <div class="col">
        <h1 style="color: red;">SECCIÓN ADMINISTRADOR</h1>
    </div>
</div>


@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 text-center mb-3">
        <a href="{{ route('vehicle.index') }}" class="btn btn-primary btn-lg d-flex flex-column align-items-center" style=" width: 100%;">
            <img src="https://images.unsplash.com/photo-1620059116993-398c21ce8406?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Imagen Vehicular" style="height: 190px;">
            Administración Vehicular
        </a>
    </div>


    <div class="col-md-6 text-center mb-3">
        <a href="{{ route('adminDrivers.index') }}" class="btn btn-danger btn-lg d-flex flex-column align-items-center" style=" width: 100%;">
            <img src="https://images.unsplash.com/photo-1615563164538-89e1da13fcc4?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Imagen Conductores" style="height: 190px;">
            Administración Conductores
        </a>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
