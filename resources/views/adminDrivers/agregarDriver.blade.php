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
    <h2>Agregar nuevo</h2>
    <form action="{{ route('drivers.store') }}" method="post" enctype="multipart/form-data"
        class="p-4 bg-white rounded shadow-sm mx-auto" style="max-width: 400px;">
        @csrf
        <div class="form-group">
            <label for="names" class="text-success">Nombre:</label>
            <input type="text" name="names" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="last_names" class="text-success">Apellidos:</label>
            <input type="text" name="last_names" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="identification_card" class="text-success">Identificación:</label>
            <input type="text" name="identification_card" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone" class="text-success">Teléfono:</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="rank_id" class="text-success">Rango:</label>
            <select name="rank_id" class="form-control" required>
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
        </div>

        <div class="form-group">
            <label for="blood_type" class="text-success">Tipo de Sangre:</label>
            <select name="blood_type" class="form-control" required>
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
        <div class="form-group">
            <label for="license_type" class="text-success">Tipo de Licencia:</label>
            <select name="license_type" class="form-control" required>
                <option value="A">Tipo A - Motocicletas</option>
                <option value="B">Tipo B - Automóviles y camionetas</option>
                <option value="C">Tipo C - Vehículos pesados y buses</option>
                <option value="D">Tipo D - Transporte público de pasajeros</option>
                <option value="E">Tipo E - Remolques y semirremolques</option>
                <option value="F">Tipo F - Maquinaria y equipo especial</option>
            </select>
        </div>
        <div class="form-group">
            <label for="img" class="text-success">Ingrese fotografía de la Licencia:</label>
            <input type="file" name="img" class="form-control" required>
        </div>
        <div class="p-4 bg-white rounded shadow-sm mx-auto" style="max-width: 400px;">
            <div class="form-group d-flex justify-content-between">
                <a href="{{ route('drivers.index') }}" class="btn btn-info">Regresar</a>
                <button class="btn btn-primary">Agregar</button>
            </div>
        </div>
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
