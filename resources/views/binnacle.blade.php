@extends('adminlte::page')

@section('title', 'BITÁCORA')

@section('content_header')
    <div class="row justify-content-center align-item-center">
        <div class="col text-center">
            <h1>BITÁCORA NOVEDADES UFA-ESPE "SANTO DOMINGO"</h1>
        </div>
    </div>
    <div class="row h-100 mt-1">
        <div class="col-10 offset-1 d-flex align-items-center justify-content-center">
            <button class="btn btn-lg btn-success" mr-5" data-toggle="modal" data-target="#modalRegistro">REGISTRAR
                NOVEDAD</button>
        </div>
    </div>

@stop


@section('content')

    <div class="row">

        <div class="col ">
            {{-- TABLA SUPERIOR --}}
            <div class="card">

                <div class="card-header ">
                    
                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body table-responsive pl-2 pr-2">
                    <table id="binnacleTable" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">ORD</th>
                                <th class="text-center">NOVEDADES</th>
                                <th class="text-center">FECHA/HORA</th>
                                <th class="text-center">GUARDIA TURNO</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $ord = 0; ?>
                            @foreach ($novelties as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ ++$ord }}                                        
                                    </td>
                                    <td class="">
                                        {{ $item->novelty }}
                                    </td>
                                    <td class="text-center">
                                        {{ $item->hour }}
                                    </td>
                                    <td class="text-center">
                                        {{ $item->Guard }}
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

    {{-- MODAL PARA REGISTRAR UNA NUEVA NOVEDAD --}}
    <div class="modal" tabindex="-1" id="modalRegistro">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">NUEVA NOVEDAD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('binacle.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div id="modificarRegistro" class="row mt-3" style="">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="novelty">Detalle la novedad: </label>
                                    <textarea name="novelty" id="novelty" class="form-control" rows="3" ></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                        <button type="submit" id="btnIngreso" style="" class="btn btn-success">GUARDAR</button>
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


        $("#binnacleTable").dataTable({
            "paging": true,
            "ordering": false,
            "language": {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
            },
            "searching": true
        });
    </script>
@stop
