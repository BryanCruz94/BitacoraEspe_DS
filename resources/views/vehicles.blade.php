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
                <div id='alertaMensaje'>
                    @if (session('message'))
                        <div class="alert alert-{{ session('type') }}">
                            <strong>{{ session('message') }}</strong>
                        </div>
                        @php
                            session()->forget('message');
                        @endphp
                    @endif
                </div>

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

                        <div style="display: none"> {{ $i = 1 }} </div>

                        <tbody>
                            @foreach ($vehicleLog as $item)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $item->plate }}
                                    </td>
                                    <td>
                                        {{ $item->description }}
                                    </td>
                                    <td>
                                        {{ $item->driver }}
                                    </td>
                                    <td>
                                        {{ $item->departure_time }}
                                    </td>
                                    <td>
                                        {{ $item->entry_time }}
                                    </td>
                                    <td>
                                        {{ $item->destination }}
                                    </td>
                                    <td>
                                        {{ $item->mission }}
                                    </td>
                                    <td>
                                        {{ $item->observation }}
                                    </td>
                                    <td>
                                        {{ $item->totalKm }}
                                    </td>
                                    <td>
                                        {{ $item->guardOut }}
                                    </td>
                                    <td>
                                        {{ $item->guardIn }}
                                    </td>
                                </tr>
                            @endforeach


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
                            <div style="display: none"> {{ $j = 1 }} </div>
                            @foreach ($vehiclesOut as $vehicle)
                                <tr>
                                    <td>
                                        {{ $j++ }}
                                    </td>
                                    <td>
                                        {{ $vehicle->plate }}
                                    </td>
                                    <td>
                                        {{ $vehicle->description }}
                                    </td>
                                    <td>
                                        {{ $vehicle->driver }}
                                    </td>
                                    <td>
                                        {{ $vehicle->departure_time }}
                                    </td>
                                    <td>
                                        {{ $vehicle->destination }}
                                    </td>
                                    <td>
                                        {{ $vehicle->mission }}
                                    </td>
                                    <td>
                                        {{ $vehicle->guardOut }}
                                    </td>
                            @endforeach

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
                <form action="{{ route('vehiclesLog.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div id="vehOutForm" class="row mt-3" style="">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="plateOut">Placa: </label>
                                    {{-- CREAR UN INPUT SELECT CON 6 OPCIONES --}}
                                    <select name="plateOut" id="plateOut" class="form-control">
                                        @foreach ($vehicles as $vehicle)
                                            @if ($vehicle->in_university == 1 && $vehicle->is_active == 1)
                                                <option value="{{ $vehicle->id }}">{{ $vehicle->plate }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="driverForm">Conductor: </label>
                                    <select name="Driver_id" id="Driver_id" class="form-control">
                                        @foreach ($drivers as $driver)
                                            @if ($driver->is_active == 1)
                                                <option value="{{ $driver->id }}">{{ $driver->rank->name }}
                                                    {{ $driver->names }} {{ $driver->last_names }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="destination">Destino: </label>
                                    <input type="text" name="destination" id="destination" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="departure_km">KM Salida: </label>
                                    <input type="number" name="departure_km" id="departure_km" class="form-control" required>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="mission">Misión:</label>
                                    <textarea name="mission" id="mission" class="form-control" rows="3" required></textarea>
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
                <form action="{{ route('vehiclesLog.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div id="vehOutForm" class="row mt-3" style="">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="plateIn">Placa: </label>
                                    {{-- CREAR UN INPUT SELECT CON 6 OPCIONES --}}
                                    <select name="plateIn" id="plateIn" class="form-control">
                                        @foreach ($vehicles as $vehicle)
                                            @if ($vehicle->in_university == 0)
                                                <option value="{{ $vehicle->id }}">{{ $vehicle->plate }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="entry_km">KM Ingreso: </label>
                                    <input type="number" name="entry_km" id="entry_km" class="form-control" required>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="observation">Observaciones:</label>
                                    <textarea name="observation" id="observation" class="form-control" rows="3" required></textarea>
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

        $(document).ready(function() {
            setTimeout(function() {
                $('#alertaMensaje').fadeOut('fast');
            }, 3000);
        });
    </script>
@stop
