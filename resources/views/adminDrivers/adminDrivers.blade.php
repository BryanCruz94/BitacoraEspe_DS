@extends('adminlte::page')

@section('title', 'ADMINISTRACIÓN CONDUCTORES')

@section('content_header')
@include('layouts.newHeader')
    <div class="row justify-content-center align-item-center">
        <div class="col text-center">
            <h1>ADMINISTRACIÓN DE CONDUCTORES</h1>
        </div>
    </div>

@stop

@section('content')

    <div class="row">
        <div class="col">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @if ($mensaje = Session::get('success'))
                            <div class="alert alert-success" roles="alert">
                                {{ $mensaje }}

                            </div>
                        @endif
                    </div>
                </div>

            </div>
            <p>
                <a href="{{ route('drivers.create') }}" class="btn btn-primary">Agregar Conductor</a>

            </p>
            <h4 class="text-center">Listado de conductores</h4>


            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Grado </th>
                        <th scope="col" class="text-center text-wrap">Apellidos y Nombres</th>
                        <th scope="col" class="text-center">Identificación </th>
                        <th scope="col" class="text-center">Telefono</th>
                        <th scope="col" class="text-center">Tipo de sangre</th>
                        <th scope="col" class="text-center">Licencia</th>
                        <th scope="col" class="text-center">Imagen</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Editar</th>
                        <th scope="col" class="text-center">Eliminar</th>
                    </tr>
                </thead>
                @php
                    $i = 1;
                @endphp
                <tbody>

                    @foreach ($datos as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center text-wrap">{{ $item->last_names . ' ' . $item->names }}</td>
                            <td class="text-center">{{ $item->identification_card }}</td>
                            <td class="text-center">{{ $item->phone }}</td>
                            <td class="text-center">{{ $item->blood_type }}</td>
                            <td class="text-center">{{ $item->license_type }}</td>
                            <td><img src="{{Storage::url($item->img) }}" alt="user" width="60px" height="60px">
                            </td>
                            <td class="text-center">
                                @if ($item->is_active == 1)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Baja</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('drivers.edit', $item->id) }}" method="post">
                                    {{-- <form action="#" method="post"> --}}
                                    @csrf
                                    <button class="btn btn-warning btn-small">
                                        <span class="fas fa-user-edit"></span>
                                    </button>
                                </form>
                            </td>
                            <td>

                                <form action="{{ route('drivers.destroy', $item->id)}}" method="post" onsubmit="return confirmarEli()">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        <span class="fas fa-user-times"></span>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    <script>
                        function confirmarEli() {
                            return confirm('¿Estás seguro que quieres eliminar este registro?')
                        }
                    </script>
                </tbody>
            </table>
        </div>

    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
