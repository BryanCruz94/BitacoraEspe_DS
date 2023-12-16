@extends('adminlte::page')

@section('title', 'ADMINISTRACIÓN VEHÍCULOS')

@section('content_header')
    <div class="row justify-content-center align-item-center">
        <div class="col text-center">
            <h1>ADMINISTRACIÓN DE VEHÍCULOS"</h1>
        </div>
    </div>
    <div class="row h-100 mt-1 justify-content-center align-items-center pr-5 mr-2">
        <div class="col-4 offset-1 d-flex align-items-center justify-content-center">
            <button class="btn btn-lg btn-danger" mr-5" data-toggle="modal" data-target="#modalVehOut">REGISTRAR
                VEHÍCULO</button>
        </div>
    </div>
@stop

@section('content')
    {{-- ESPACIO DE BOTÓN PARA REGISTRAR NOVEDADES --}}

    <div class="row">

        <div class="col ">
            {{-- TABLA SUPERIOR --}}
            <div class="card">

                <div class="card-header text-center" style="padding:0; padding-top:3px">
                    <div>
                        <h3>ACTUALIZAR VEHICULOS EXISTENTES</h3>
                    </div>
                    <div class="card-tools" style=" ">
                    </div>
                </div>

                <div class="card-body table-responsive pl-2 pr-2">
                    <table id="movVehiclesTable" class="table table-hover text-nowrap">
                        <form action="{{ route('personas.update', $datosEditar->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="">Placa</label>
                            <input type="text" name="nombre" class="form-control" required value = "{{$datosEditar->nombre}}">
                            <label for="">Descripción</label>
                            <input type="text" name="apellido" class="form-control" required value = "{{$datosEditar->apellido}}">
                            <label for="">Lugar</label>
                            <input type="text" name="direccion" class="form-control" required value = "{{$datosEditar->direccion}}">
                            <label for="">Fotografía</label> 
                            <img src="{{Storage::url($datosEditar->foto)}}" alt="fotito" width="100">
                            <input type="file" name="foto" class="form-control" required value = "{{$datosEditar->foto}}"><br>
                            <a href="{{route('adminVehicle.index')}}" class="btn btn-info">Regresar</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>

                            {{-- MEDIANTE UN CICLO FOR CREAR 4 FILAS CON 4 COLUMNAS CADA UNA --}}
                            @for ($i = 0; $i < 15; $i++)
                                <tr>
                                    <td class="text-center">
                                        {{ $i + 1 }}
                                    </td>
                                    <td
                                        style="max-width: 800px; min-width: 200px;
                        white-space: normal;">
                                        -
                                    </td>
                                    <td class="text-center">
                                        -
                                    </td>
                                    <td class="text-center">
                                        -
                                    </td>
                                    <td class="text-center">
                                        -
                                    </td>
                                    <td class="text-center">
                                        -
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');


        $("#adminVechicle").dataTable({
            "paging": true,
            "ordering": false,
            "language": {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
            },
            "searching": true
        });
    </script>
@stop
