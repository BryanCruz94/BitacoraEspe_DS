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
    <h2>EDITAR REGISTRO</h2>

    <form action="{{ route('drivers.update', $drivers->id) }}" method="post" enctype="multipart/form-data">

        @csrf
        <label for="names">Nombre: </label>
        <input type="text" name="names" class="form-control" required value={{$drivers->names}}>

        <label for="last_names">Apellidos: </label>
        <input type="text" name="last_names" class="form-control" required value={{$drivers->last_names}}>

        <label for="identification_card">Identicación: </label>
        <input type="text" name="identification_card" class="form-control" required value={{$drivers->identification_card}}>

        <label for="phone">Teléfono: </label>
        <input type="text" name="phone" class="form-control" required required value={{$drivers->phone}}>


        <label for="name">Rango: </label>
        <select name="rank_id" required >

           @foreach ($ranks as $rank )
              <option value="{{$rank->id}}"  @if ($drivers->rank_id == $rank->id)
                  selected  @endif >{{$rank->name}}</option>
           @endforeach
        </select>




        <label for="blood_type">Tipo de Sangre:</label>
        <select name="blood_type" required >
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>
        <br>

        <label for="license_type">Tipo de Licencia:</label>
        <select name="license_type" class="form-control" required>
            <option value="A">Tipo A - Motocicletas</option>
            <option value="B">Tipo B - Automóviles y camionetas</option>
            <option value="C">Tipo C - Vehículos pesados y buses</option>
            <option value="D">Tipo D - Transporte público de pasajeros</option>
            <option value="E">Tipo E - Remolques y semirremolques</option>
            <option value="F">Tipo F - Maquinaria y equipo especial</option>
        </select>

        <br>

        <label for="img_url">Ingrese su imagen: </label>
        <input type="file" name="img_url" class="form-control" required>

        <a href="{{ route('drivers.index') }}" class="btn btn-info">Regresar</a>
        <button class="btn btn-primary">Actualizar</button>


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
