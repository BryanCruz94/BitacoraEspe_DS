@extends('adminlte::page')

@section('title', 'MOVIMIENTO VEHICULAR')

@section('content_header')
    <div class="row justify-content-center align-item-center">
        <div class="col text-center">
            <h1>BITÁCORA DE MOVIMIENTO VEHICULAR UFA-ESPE "SANTO DOMINGO"</h1>
        </div>
    </div>
    <div class="row h-100 mt-1 justify-content-center align-items-center pr-5 mr-2">
        <div class="col-4 offset-1 d-flex align-items-center justify-content-center">
            <button class="btn btn-lg btn-danger" mr-5" data-toggle="modal" data-target="#modalVehOut">REGISTRAR
                SALIDA</button>
        </div>
        <div class="col-4 offset-1 d-flex align-items-center justify-content-center">
            <button class="btn btn-lg btn-success" mr-5" data-toggle="modal" data-target="#modalVehIn">REGISTRAR
                INGRESO</button>
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
                        <h3>MOVIMIENTO</h3>
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
                                <th class="text-center">CONDUCTOR</th>
                                <th class="text-center">HORA SALIDA</th>
                                <th class="text-center">HORA ENTRADA</th>
                                <th class="text-center">DESTINO</th>
                                <th class="text-center">MISIÓN</th>
                                <th class="text-center">OBSERVACIÓN</th>
                                <th class="text-center">KM RECORRIDO</th>
                                <th class="text-center">GUARDIA SALIDA</th>
                                <th class="text-center">GUARDIA ENTRADA</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($registros1 as $item)
                    <tr>
                        <td>
                            {{ $item->PLACA }}
                        </td>
                        <td style="max-width: 800px; min-width: 200px;
                        white-space: normal;">
                            {{ $item->DESCRIPCION }}
                        </td>
                        <td>
                            {{ $item->REGISTRO }}
                        </td>
                        <td>
                            {{ $item->FECHAHORASALIDA }}
                        </td>
                    </tr>
                @endforeach --}}

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
                                        PEC-7720
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
                                    <td class="text-center">
                                        -
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>

                </div>

            </div>

            {{-- TABLA INFERIOR --}}

            <div class="card">

                <div class="card-header text-center" style="padding:0; padding-top:3px">
                    <div>
                        <h3>VEHÍCULOS FUERA DE LA UNIVERSIDAD</h3>
                    </div>
                    <div class="card-tools" style=" ">
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table id="vehiclesOutTable" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class='text-center'>ORD</th>
                                <th class='text-center'>PLACA</th>
                                <th class='text-center'>DESCRIPCIÓN</th>
                                <th class='text-center'>CONDUCTOR</th>
                                <th class='text-center'>SALIDA</th>
                                <th class='text-center'>DESTINO</th>
                                <th class='text-center'>MISIÓN</th>
                                <th class='text-center'>GUARDIA SALIDA</th>

                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 3; $i++)
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
                                        PEC-7720
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

    {{-- MODAL PARA REGISTRAR SALIDA VEHICULAR --}}
    <div class="modal" tabindex="-1" id="modalVehOut">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REGISTRO SALIDA VEHICULAR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div id="vehOutForm" class="row mt-3" style="">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="plateOut">Placa: </label>
                                    {{-- CREAR UN INPUT SELECT CON 6 OPCIONES --}}
                                    <select name="plateOut" id="plateOut" class="form-control">
                                        <option value="1">PEC-7720</option>
                                        <option value="2">PEC-7721</option>
                                        <option value="3">PEC-7722</option>
                                        <option value="4">PEC-7723</option>
                                        <option value="5">PEC-7724</option>
                                        <option value="6">PEC-7725</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="driverForm">Conductor: </label>
                                    {{-- CREAR UN INPUT SELECT CON 6 OPCIONES --}}
                                    <select name="driverForm" id="driverForm" class="form-control">
                                        <option value="1">SGOS SANGUCHO LUIS</option>
                                        <option value="2">SGOS SANGUCHO LUIS</option>
                                        <option value="3">SGOS SANGUCHO LUIS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="destination">Destino: </label>
                                    <input type="text" name="destination" id="destination" class="form-control">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mileageOut">KM Salida: </label>
                                    <input type="text" name="mileageOut" id="mileageOut" class="form-control">
                                    
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="mission">Misión:</label>
                                    <textarea name="mission" id="mission" class="form-control" rows="3"></textarea>
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

    {{-- MODAL PARA REGISTRAR INGRESO VEHICULAR --}}
    <div class="modal" tabindex="-1" id="modalVehIn">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REGISTRO INGRESO VEHICULAR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div id="vehOutForm" class="row mt-3" style="">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="plateIn">Placa: </label>
                                    {{-- CREAR UN INPUT SELECT CON 6 OPCIONES --}}
                                    <select name="plateIn" id="plateIn" class="form-control">
                                        <option value="1">PEC-7720</option>
                                        <option value="2">PEC-7721</option>
                                        <option value="3">PEC-7722</option>
                                        <option value="4">PEC-7723</option>
                                        <option value="5">PEC-7724</option>
                                        <option value="6">PEC-7725</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mileageIn">KM Ingreso: </label>
                                    <input type="text" name="mileageIn" id="mileageIn" class="form-control">
                                    
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="observation">Observaciones:</label>
                                    <textarea name="observation" id="observation" class="form-control" rows="3"></textarea>
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

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $("#movVehiclesTable").dataTable({
            "paging": true,
            "ordering": false,
            "language": {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
            },
            "searching": true
        });
    </script>
@stop
