@extends('layout.principal')

@section('tituloPagina','Crear un nuevo registro')

@section('contenido')
<h2>Agregar nuevo</h2>

<form action="{{ route('adminDrivers.store')}}" method="post" enctype="multipart/form-data">

    @csrf
    <label for="names">Nombre: </label>
    <input type="text" name="names" class="form-control" required>

    <label for="last_names">Apellidos: </label>
    <input type="date" name="last_names" class="form-control" required>

    <label for="identification_card">Identicación: </label>
    <input type="text" name="identification_card" class="form-control" required>

    <label for="phone">Teléfono: </label>
    <input type="text" name="phone" class="form-control" required>


    <label for="name">Rango: </label>
    <select name="rank_id">
        <option value="1">T.P</option>
        <option value="2" selected>SLDO</option>
        <option value="3">CBOS</option>
        <option value="4">CBOP</option>
        <option value="5">SGOS</option>
        <option value="6">SGOP</option>
        <option value="7">SUBS</option>
        <option value="8">SUBP</option>
        <option value="9">SUBM</option>
        <option value="10">SUBT</option>
        <option value="11">TNTE</option>
        <option value="12">CAPT</option>
        <option value="13">MAYO</option>
        <option value="14">TCRN</option>
        <option value="15">CRNL</option>
        <option value="16">GRAB</option>
    </select>

    <label for="blood_type">Tipo de sangre: </label>
    <input type="text" name="blood_type" class="form-control" required>

    <label for="license_number">Numero de licencia: </label>
    <input type="text" name="license_number" class="form-control" required>

    <label for="img_url">Ingrese su imagen: </label>
    <input type="file" name="img_url" class="form-control" required>

    <a href="{{ route('adminDrivers.index')}}" class="btn btn-info">Regresar</a>
    <button class="btn btn-primary">Agregar</button>


</form>

@endsection