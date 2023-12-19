@extends('adminlte::page')

@section('title', 'ADMINISTRACIÓN CONDUCTORES')

@section('content_header')
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
            <h5>Listado de conductores</h5>

            <p>
                <a href="{{ route('drivers.create') }}" class="btn btn-primary">Agregar Persona</a>
                {{-- <a href="#" class="btn btn-primary">Agregar Persona</a> --}}
            </p>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rango </th>
                        <th scope="col">Identificación </th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Tipo de sangre</th>
                        <th scope="col">Licencia</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                @php
                    $i = 1;
                @endphp
                <tbody>

                    @foreach ($datos as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $item->rank_id }}</td>
                            <td>{{ $item->identification_card }}</td>
                            <td>{{ $item->names . ' ' . $item->last_names }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->blood_type }}</td>
                            <td>{{ $item->license_type }}</td>
                            <td><img src="{{Storage::url($item->img_url) }}" alt="user" width="70px" height="70px">
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

                                <form action="{{ route('drivers.destroy', $item->id)}}" method="post">
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
