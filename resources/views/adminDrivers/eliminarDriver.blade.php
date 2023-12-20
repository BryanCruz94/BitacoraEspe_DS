@extends('adminlte::page')

@section('title', 'ADMINISTRADOR')

@section('content_header')
    <div class="row justify-content-center align-items-center bg-white text-center">
        <div class="col">
            <h1 style="color: red;">SECCIÓN ADMINISTRADOR</h1>
        </div>
    </div>


@stop

@section('content')
<h2>ALERTA</h2>
<div class="row">
    <h3 class="col">Está Seguro que desea eliminar el siguiente registro:</h3>
</div>

<div class="row">
    <div class="col">
        <table class="table table-striped">
            <thead>
              <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Identifación</th>
                <th scope="col">telefono</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center" scope="row">1</th>
                    <td>
                        <img src="{{ asset('storage/img/' . basename($item->img_url)) }}" class="img-fluid rounded" alt="Imagen de perfil" style="width: 100px;">
                    </td>
                    <td>{{ $item->names . ' ' . $item->last_names }}</td>
                    <td>{{ $item->identification_card }}</td>
                    <td>{{ $item->phone }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<form action="{{route('drivers.destroy', $drivers->id)}}" method="post" >
    @csrf
    <a href="{{route("drivers.index")}}" class="btn btn-primary"> Cancelar </a>
    <button class="btn btn-danger"> Eliminar </button>

    <br>
</form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
