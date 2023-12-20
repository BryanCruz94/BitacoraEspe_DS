@extends('adminlte::page')

@section('title', 'ADMINISTRACIÓN VEHÍCULOS')

@section('content_header')
    <div class="row justify-content-center align-item-center">
        <div class="col text-center">
            <h1>ADMINISTRACIÓN DE USUARIOS</h1>
        </div>
    </div>
    <div class="row h-100 mt-1 justify-content-center align-items-center pr-5 mr-2">
    </div>

@stop

@section('content')

    <div class="rounded border border-white shadow p-3">
        <div class="text-center">
            <h3 class="text-danger text-center">ELIMINAR USUARIO</h3>
        </div>
        <div class="text-center">
            <h4 class="text-danger text-center">¿ESTA SEGURO QUE DESEA ELIMINAR EL SIGUIENTE USUARIO?</h4>
        </div>
        <div class="card-body table-responsive pl-2 pr-2">
            <table id="movVehiclesTable" class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th class="text-center">ORD</th>
                        <th class="text-center">NOMBRES Y APELLIDOS</th>
                        <th class="text-center">CORREO ELECTRÓNICO</th>
                        <th class="text-center">CÉDULA IDENTIDAD</th>
                    </tr>
                </thead>

                <tbody>

                            <td class="text-center">
                                1
                            </td>
                            <td class="text-center">
                                {{ $datos->names }} {{ $datos->last_names }}
                            </td>
                            <td class="text-center">
                                {{ $datos->email }}
                            </td>
                            <td class="text-center">
                                {{ $datos->identification_card}}
                            </td>
                        </tr>



                </tbody>
            </table>
            <div class="modal-footer">
                <a href="{{route("user.index")}}" class="btn btn-warning" >CANCELAR</a>

                <form action="{{route('user.destroy', $datos->id)}}" method="POST">
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
