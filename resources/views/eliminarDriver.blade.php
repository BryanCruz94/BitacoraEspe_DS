@extends('layout.principal')

@section('tituloPagina','Eliminar un registro')

@section('contenido')
<h2>Actualizar nuevo</h2>

<form action="{{ route('personas.destroy',  $personas->id)}}" method="post">

    @csrf
    <label for="name">Nombre: </label>
    <input type="text" name="name" class="form-control" required value="{{$personas->name}}">

    <label for="apellido">Apellido: </label>
    <input type="text" name="apellido" class="form-control" required value="{{$personas->apellido}}">

    <label for="direccion">Dirección: </label>
    <input type="text" name="direccion" class="form-control" required value="{{$personas->direccion}}">

    <label for="telefono">Teléfono: </label>
    <input type="text" name="telefono" class="form-control" required value="{{$personas->telefono}}">

    <label for="fecha_nacimiento">Fecha nacimiento: </label>
    <input type="date" name="fecha_nacimiento" class="form-control" required value="{{$personas->fecha_nacimiento}}">

    <a href="{{ route('personas.index')}}" class="btn btn-info">Regresar</a>
    <button class="btn btn-primary">Actualizar</button>
</form>

@endsection