@extends('adminlte::page')

@section('title', 'ADMINISTRACIÓN VEHÍCULOS')

@section('content_header')
@include('layouts.newHeader')
    <div class="row justify-content-center align-item-center">
        <div class="col text-center">
            <h1>ADMINISTRACIÓN DE VEHÍCULOS</h1>
        </div>
    </div>
    <div class="row h-100 mt-1 justify-content-center align-items-center pr-5 mr-2">
        <div class="col-4 offset-1 d-flex align-items-center justify-content-center">
            <button class="btn btn-lg btn-success mr-5" data-toggle="modal" data-target="#modalVehIn">
                REGISTRAR NUEVO VEHÍCULO</button>
        </div>
    </div>

@stop

@section('content')


    <div class="row">

        <div class="col ">
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
                            @foreach ($datos as $i => $dato)
                                <tr>
                                    <td class="text-center">
                                        {{ $i + 1 }}
                                    </td>
                                    <td class="text-center">
                                        {{ $dato->plate }}
                                    </td>
                                    <td class="text-center">
                                        {{ $dato->description }}
                                    </td>
                                    <td class="text-center">
                                        @if ($dato->in_university == 1)
                                            <span class="badge badge-success">Dentro de la Universidad</span>
                                        @else
                                            <span class="badge badge-danger">Fuera de la Universidad</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url($dato->img_url) }}" alt="fotito" width="100">
                                    </td>
                                    <td class="text-center">
                                        {{-- Formulario para editar --}}
                                        <form action="{{ route('adminVehicles.edit', $dato->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-secondary btn-sm" data-toggle="modal">
                                                <span class="fas fa-user-edit"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        {{-- Formulario para eliminar --}}
                                        <form action="{{ route('adminVehicles.delete', $dato->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <span class="fas fa-user-times"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- MODAL PARA REGISTRAR INGRESO DE NUEVO VEHÍCULO --}}
    <div class="modal" tabindex="-1" id="modalVehIn">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REGISTRO DEL VEHICULAR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="forNewVehicle" action="{{ route('vehicle.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div id="vehOutForm" class="row mt-3" style="">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="plate">Placa: </label>
                                    <input type="text" name="plate" id="plate" class="form-control"
                                        placeholder="AAA-0000" required>

                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="description">Descripción: </label>
                                    <input type="text" name="description" id="description" class="form-control"
                                        placeholder="Camioneta D-Max Blanca" required>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="lugar">Dentro de la Universidad: </label>
                                    <input type="checkbox" name="in_university" id="in_university" class="form-control"
                                        checked>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="img">Fotografía:</label>
                                    <input type="file" name="img" id="img" class="form-control" rows="3"
                                        required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                        <button type="submit" id="btnIngreso" class="btn btn-success">GUARDAR</button>
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
        $("#adminVechicle").dataTable({
            "paging": true,
            "ordering": false,
            "language": {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
            },
            "searching": true
        });

        $(document).ready(function() {
            // Función para validar el formato de placa
            function validarPlate(plate) {
                var regex = /^(?:[A-Z]{3}-\d{4}|[A-Z]{2}\d{3}[A-Z])$/;
                return regex.test(plate);
            }

            // Evento input en el campo de placa
            $('#plate').on('input', function() {
                var plateValue = $(this).val();

                if (validarPlate(plateValue)) {
                    // El valor es válido, aplicar estilo de éxito
                    $(this).removeClass('is-invalid').addClass('is-valid');
                } else {
                    // El valor no es válido, aplicar estilo de error
                    $(this).removeClass('is-valid').addClass('is-invalid');
                }
            });

            // Evento submit en el formulario
            $('#forNewVehicle').submit(function(e) {
                e.preventDefault(); // Evitar el envío del formulario por defecto

                var plateValue = $('#plate').val();

                if (validarPlate(plateValue)) {
                    // La placa es válida, permitir el envío del formulario
                    this.submit();
                } else {
                    // Mostrar mensaje de error y evitar el envío del formulario
                    alert('La placa no cumple con el formato requerido (AAA-0000 o AA000A).');
                }
            });
        });
    </script>
@stop
