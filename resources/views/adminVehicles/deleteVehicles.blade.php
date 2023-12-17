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
            <h3 class="text-danger text-center">ELIMINAR VEHÍCULO</h3>
        </div>
        <div class="text-center">
            <h4 class="text-danger text-center">¿ESTA SEGURO QUE DESEA ELIMINAR EL SIGUIENTE VEHÍCULO?</h4>
        </div>
        <div class="card-body table-responsive pl-2 pr-2">
            <table id="movVehiclesTable" class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th class="text-center">ORD</th>
                        <th class="text-center">PLACA</th>
                        <th class="text-center">DESCRIPCIÓN</th>
                        <th class="text-center">FOTOGRAFÍA</th>
                    </tr>
                </thead>

                <tbody>

                            <td class="text-center">
                                1
                            </td>
                            <td class="text-center">
                                {{ $datos->plate }}
                            </td>
                            <td class="text-center">
                                {{ $datos->description }}
                            </td>
                            <td class="text-center">
                                <img src="{{ Storage::url($datos->img_url) }}" alt="fotito" width="100">
                            </td>
                        </tr>



                </tbody>
            </table>
            <div class="modal-footer">
                <a href="{{route("vehicle.index")}}" class="btn btn-warning" >CANCELAR</a>

                <form action="{{route('adminVehicles.destroy', $datos->id)}}" method="POST">
                    @csrf

                <input type="submit" id="btnIngreso" style="" class="btn btn-danger" value="ELIMINAR"></input>
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
