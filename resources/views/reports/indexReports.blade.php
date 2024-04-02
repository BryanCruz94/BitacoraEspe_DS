@extends('adminlte::page')

@section('title', 'ADMINISTRADOR')

@section('content_header')
<div class="row justify-content-center align-items-center bg-white text-center" >
    <div class="col">
        <h1 style="color: red;">SECCIÓN REPORTES</h1>
    </div>
</div>


@stop

@section('content')
<div class="row justify-content-around ">
    <div class="col-5">
        {{-- FORMULARIO PARA VEHÍCULOS --}}
    <form action="{{route('report.vehicles')}}" method="POST" style="display: flex">
        @csrf

        <div class="card card-danger" style="max-width: 80% ; justify-self: center">
            <div class="card-header">
                <h3 class="card-title text-center">GENERAR REPORTE DE MOVIMIENTO VEHICULAR</h3>
            </div>
            <div class="card-body">

                <div class="form-group">

                    <label for="fechaInicio">Seleccione fecha y hora de inicio de reporte:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="datetime-local" class="form-control" id="fechaInicio" name="fechaInicio" required />
                    </div>
                </div>


                <div class="form-group">
                    <label for="fechaFin">Seleccione fecha y hora de fin de reporte:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="datetime-local" class="form-control" id="fechaFin" name="fechaFin" required />
                    </div>
                </div>
            </div>
            <div class="form-group" style="display: flex; grid-column-gap: 20px; justify-content: center">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-file-earmark-pdf"></i>
                    GENERAR PDF
                </button>

            </div>
        </div>


    </form>
    </div>

    <div class="col-5">
        {{-- FORMULARIO PARA NOVEDADES--}}
    <form action="{{route('report.novelties')}}" method="POST" style="display: flex">
        @csrf

        <div class="card card-danger" style="max-width: 80% ; justify-self: center">
            <div class="card-header">
                <h3 class="card-title text-center">GENERAR REPORTE DE BITÁCORA DE NOVEDADES</h3>
            </div>
            <div class="card-body">

                <div class="form-group">

                    <label for="fechaInicio">Seleccione fecha y hora de inicio de reporte:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="datetime-local" class="form-control" id="fechaInicio" name="fechaInicio" required />
                    </div>
                </div>


                <div class="form-group">
                    <label for="fechaFin">Seleccione fecha y hora de fin de reporte:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="datetime-local" class="form-control" id="fechaFin" name="fechaFin" required />
                    </div>
                </div>
            </div>
            <div class="form-group" style="display: flex; grid-column-gap: 20px; justify-content: center">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-file-earmark-pdf"></i>
                    GENERAR PDF
                </button>


            </div>
        </div>


    </form>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
