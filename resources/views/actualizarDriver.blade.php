@extends('layout.principal')

@section('tituloPagina','Actualizar un registro')

@section('contenido')
<h2>Actualizar nuevo</h2>

<form action="{{ route('personas.update',  $personas->id)}}" method="post" enctype="multipart/form-data">

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

    <label for="img">Ingrese su imagen: </label>
    <input type="file" name="img" class="form-control" required>

    <a href="{{ route('personas.index')}}" class="btn btn-info">Regresar</a>
    <button class="btn btn-primary">Actualizar</button>
</form>

@endsection