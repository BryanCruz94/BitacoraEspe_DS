@extends('adminlte::page')

@section('title', 'ADMINISTRACIÓN USUARIOS')

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
            <h3 class="text-danger text-center">MODIFICAR USUARIO</h3>

        </div>
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

                <div id="vehOutForm" class="row mt-3" style="">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="names">Nombres: </label>
                            <input type="text" name="names" id="names" class="form-control"
                                placeholder="Juan Esteban" value="{{ $user->names }}" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="last_names">Apellidos: </label>
                            <input type="text" name="last_names" id="last_names" class="form-control"
                                placeholder="Flores" value="{{ $user->last_names }}" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">Correo Electrónico: </label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="example@espe.edu.ec" value="{{ $user->email }}" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="password">Contraseña: </label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="password_verify">Verificar Contraseña: </label>
                            <input type="password" name="password_verify" id="password_verify" class="form-control">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="identification_card">Cédula de Identidad: </label>
                            <input type="text" name="identification_card" id="identification_card" class="form-control"
                                placeholder="1711111111" value="{{ $user->identification_card }}" required>
                        </div>
                    </div>


                    <div class="col-3">
                        <div class="form-group">
                            <label for="phone">Celular: </label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                placeholder="0911111111" value="{{ $user->phone }}" required>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="blood_type">Tipo de Sangre:</label>
                            <select name="blood_type" id="blood_type" required>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-3">
                        <div class="form-group">
                            <label for="is_admin">Administrador: </label>
                            <input type="checkbox" name="is_admin" id="is_admin" class="form-control">
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="is_active">Activo: </label>
                            <input type="checkbox" name="is_active" id="is_active" class="form-control">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('user.index') }}" class="btn btn-danger">CANCELAR</a>
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
