@extends('adminlte::page')

@section('title', 'ADMINISTRACIÓN USUARIOS')

@section('content_header')
@include('layouts.newHeader')
    <div class="row justify-content-center align-item-center">
        <div class="col text-center">
            <h1>ADMINISTRACIÓN DE USUARIO</h1>
        </div>
    </div>
    <div class="row h-100 mt-1 justify-content-center align-items-center pr-5 mr-2">
        <div class="col-4 offset-1 d-flex align-items-center justify-content-center">
            <button class="btn btn-lg btn-success mr-5" data-toggle="modal" data-target="#modalVehIn">
                REGISTRAR NUEVO USUARIO</button>
        </div>
    </div>

@stop

@section('content')


    <div class="row">

        <div class="col ">
            <div class="card">

                <div class="card-header text-center" style="padding:0; padding-top:3px">
                    <div>
                        <h3>USUARIOS ACTUALES</h3>
                    </div>
                    <div class="card-tools" style=" ">
                    </div>
                </div>

                <div class="card-body table-responsive pl-2 pr-2">
                    <table id="movVehiclesTable" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">ORD</th>
                                <th class="text-center text-wrap">NOMBRE Y APELLIDO</th>
                                <th class="text-center text-wrap">CORREO ELECTRÓNICO</th>
                                <th class="text-center text-wrap">CÉDULA DE IDENTIDAD</th>
                                <th class="text-center">CEULAR</th>
                                <th class="text-center">TIPO SANGRE</th>
                                <th class="text-center">ESTADO</th>
                                <th class="text-center">ROL</th>
                                <th class="text-center">EDITAR</th>
                                <th class="text-center">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i => $dato)
                                <tr>
                                    <td class="text-center">
                                        {{ $i + 1 }}
                                    </td>
                                    <td class="text-center text-wrap">
                                        {{ $dato->last_names }} {{ $dato->names }}
                                    </td>
                                    <td class="text-center">
                                        {{ $dato->email }}
                                    </td>
                                    <td class="text-center">
                                        {{ $dato->identification_card }}
                                    </td>
                                    <td class="text-center">
                                        {{ $dato->phone }}
                                    </td>
                                    <td class="text-center">
                                        {{ $dato->blood_type }}
                                    </td>

                                    <td class="text-center">
                                        @if ($dato->is_active == 1)
                                            <span class="badge badge-success">Activo</span>
                                        @else
                                            <span class="badge badge-danger">Baja</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if ($dato->is_admin == 0)
                                            <span class="badge badge-primary">User</span>
                                        @else
                                            <span class="badge badge-warning">Admin</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{-- Formulario para editar --}}
                                        <form action="{{ route('user.edit', $dato->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-secondary btn-sm" data-toggle="modal">
                                                <span class="fas fa-user-edit"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        {{-- Formulario para eliminar --}}
                                        <form action="{{ route('user.delete', $dato->id) }}" method="POST">
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
                    <h5 class="modal-title">REGISTRO NUEVO USUARIO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div id="vehOutForm" class="row mt-3" style="">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="names">Nombres: </label>
                                    <input type="text" name="names" id="names" class="form-control"
                                        placeholder="Juan Esteban" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="last_names">Apellidos: </label>
                                    <input type="text" name="last_names" id="last_names" class="form-control"
                                        placeholder="Flores" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico: </label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="example@espe.edu.ec" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="password">Contraseña: </label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="password_verify">Verificar Contraseña: </label>
                                    <input type="password" name="password_verify" id="password_verify"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="identification_card">Cédula de Identidad: </label>
                                    <input type="text" name="identification_card" id="identification_card"
                                        class="form-control" placeholder="1711111111" required>
                                </div>
                            </div>


                            <div class="col-4">
                                <div class="form-group">
                                    <label for="phone">Celular: </label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="0911111111" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="blood_type">Tipo de Sangre:</label>
                                    <select name="blood_type" id="blood_type" required>
                                        <option value="A+">A+</option>
                                        <option value="A-" selected>A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-4">
                                <div class="form-group">
                                    <label for="is_admin">Administrador: </label>
                                    <input type="checkbox" name="is_admin" id="is_admin" class="form-control">
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
