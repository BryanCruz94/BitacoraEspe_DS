@extends('adminlte::page')

@section('title', 'ADMINISTRACIÓN VEHÍCULOS')

@section('content_header')
    <div class="row justify-content-center align-item-center">
        <div class="col text-center">
            <h1>ADMINISTRACIÓN DE VEHÍCULOS</h1>
        </div>
    </div>
    <div class="row h-100 mt-1 justify-content-center align-items-center pr-5 mr-2">
    </div>

@stop

@section('content')


    <div class="rounded border border-white shadow p-3">
        <div class="text-center">
            <h3 class="text-danger text-center">MODIFICAR VEHICULO</h3>

        </div>
        <form id="forUpdateVehicle" action="{{route('adminVehicles.update', $vehicle->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div id="vehOutForm" class="row mt-3" style="">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="plate">Placa: </label>
                            <input type="text" name="plate" id="plate" class="form-control"
                                value="{{ $vehicle->plate }}" required>

                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="description">Descripción: </label>
                            <input type="text" name="description" id="description" class="form-control" required
                                value="{{$vehicle->description}}">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="in_university">Dentro de la Universidad: </label>
                            <input type="checkbox" name="in_university" id="in_university" class="form-control"
                                {{ isset($vehicle) && $vehicle->in_university ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="img">Fotografía:</label>
                            <img src="{{ isset($vehicle) ? Storage::url($vehicle->img_url) : '' }}" alt="fotito"
                                width="100">
                            <input type="file" name="img" id="img" class="form-control" rows="3"
                                 value="{{ isset($vehicle) ? $vehicle->img_url : '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{route("vehicle.index")}}" class="btn btn-danger" >CANCELAR</a>
                <button type="submit" id="btnIngreso" style="" class="btn btn-success">ACTUALIZAR</button>
            </div>
        </form>
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
            $('#forUpdateVehicle').submit(function(e) {
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
