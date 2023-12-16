@extends('adminlte::page')

@section('title', 'ADMINISTRACIÓN VEHÍCULOS')

@section('content_header')
    <div class="row justify-content-center align-item-center">
        <div class="col text-center">
            <h1>ADMINISTRACIÓN DE VEHÍCULOS</h1>
        </div>
    </div>
    <div class="row h-100 mt-1 justify-content-center align-items-center pr-5 mr-2">
        <div class="col-4 offset-1 d-flex align-items-center justify-content-center">
            <button class="btn btn-lg btn-success mr-5" data-toggle="modal" data-target="#modalVehIn">
                REGISTRAR VEHÍCULO</button>
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
                        <h3>VEHÍCULOS EXISTENTES</h3>
                    </div>
                    <div class="card-tools" style=" ">
                    </div>
                </div>

                <div class="card-body table-responsive pl-2 pr-2">
                    <table id="movVehiclesTable" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">ORD</th>
                                <th class="text-center">PLACA</th>
                                <th class="text-center">DESCRIPCIÓN</th>
                                <th class="text-center">LUGAR</th>
                                <th class="text-center">FOTOGRAFÍA</th>
                                <th class="text-center">ACTUALIZAR</th>
                                <th class="text-center">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- MEDIANTE UN CICLO FOR CREAR 4 FILAS CON 4 COLUMNAS CADA UNA --}}
                            @for ($i = 0; $i < 10; $i++)
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
                                        <form action="#" method="POST">
                                            @csrf
                                            <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modalVehInAc">
                                                <span class="fas fa-user-edit"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <form action="#" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <span class="fas fa-user-times"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL PARA REGISTRAR INGRESO VEHICULAR --}}
    <div class="modal" tabindex="-1" id="modalVehIn">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REGISTRO DEL VEHICULAR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('vehicle.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div id="vehOutForm" class="row mt-3" style="">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="plate">Placa: </label>
                                    {{-- CREAR UN INPUT SELECT CON 6 OPCIONES --}}
                                    <select name="plate" id="plate" class="form-control" required>
                                        <option value="1">PEC-7720</option>
                                        <option value="2">PEC-7721</option>
                                        <option value="3">PEC-7722</option>
                                        <option value="4">PEC-7723</option>
                                        <option value="5">PEC-7724</option>
                                        <option value="6">PEC-7725</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="description">Descripción: </label>
                                    <input type="text" name="description" id="description" class="form-control" required>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="lugar">Lugar: </label>
                                    <input type="number" name="in_university" id="in_university" class="form-control" required>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="img">Fotografía:</label>
                                    <input type="file" name="img" id="img" class="form-control" rows="3" required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                        <button type="submit" id="btnIngreso" style="" class="btn btn-success">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- MODAL PARA ACTUALIZAR INGRESO VEHICULAR --}}
    <div class="modal" tabindex="-1" id="modalVehInAc">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">MODIFICAR REGISTRO VEHICULAR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('adminVehicles.update', isset($datosEditar) ? $datosEditar->id : '') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div id="vehOutForm" class="row mt-3" style="">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="plate">Placa: </label>
                                    {{-- CREAR UN INPUT SELECT CON 6 OPCIONES --}}
                                    <select name="plate" id="plate" class="form-control" required>
                                        <option value="1" {{ isset($datosEditar) && $datosEditar->plate == 1 ? 'selected' : '' }}>PEC-7720</option>
                                        <option value="2" {{ isset($datosEditar) && $datosEditar->plate == 2 ? 'selected' : '' }}>PEC-7721</option>
                                        <option value="3" {{ isset($datosEditar) && $datosEditar->plate == 3 ? 'selected' : '' }}>PEC-7722</option>
                                        <option value="4" {{ isset($datosEditar) && $datosEditar->plate == 4 ? 'selected' : '' }}>PEC-7723</option>
                                        <option value="5" {{ isset($datosEditar) && $datosEditar->plate == 5 ? 'selected' : '' }}>PEC-7724</option>
                                        <option value="6" {{ isset($datosEditar) && $datosEditar->plate == 6 ? 'selected' : '' }}>PEC-7725</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="description">Descripción: </label>
                                    <input type="text" name="description" id="description" class="form-control" required value="{{ isset($datosEditar) ? $datosEditar->description : '' }}">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="in_university">Lugar: </label>
                                    <input type="number" name="in_university" id="in_university" class="form-control" required value="{{ isset($datosEditar) ? $datosEditar->in_university : '' }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="img">Fotografía:</label>
                                    <img src="{{ isset($datosEditar) ? Storage::url($datosEditar->img_url) : '' }}" alt="fotito" width="100">
                                    <input type="file" name="img" id="img" class="form-control" rows="3" required value="{{ isset($datosEditar) ? $datosEditar->img_url : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                        <button type="submit" id="btnIngreso" style="" class="btn btn-success">ACTUALIZAR</button>
                    </div>
                </form>
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
