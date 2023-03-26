@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"><i>Cronograma de Actividades</i></h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <label for="">
                                <i>EL PROYECTO: {{ $proyecto->nombre }}</i>
                            </label>
                            @can('crear-moni_crono')
                                {{-- <a class="btn btn-dark" href="{{ route('proyectos.create') }}" ><i class="fa fa-plus" aria-hidden="true">    Agregar Nuevo Proyecto</i></a>  --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#crearModal">Crear</button>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#e03737f6">
                                    <th style="display: none;">#</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff">Descripcion</th>
                                    <th style="color:#fff;">Comunidad</th>
                                    <th style="color:#fff;">Recursos</th>
                                    <th style="color:#fff;">Empresa</th>
                                    <th style="color:#fff;">Categoria</th>
                                    <th style="color:#fff;">Inicio</th>
                                    <th style="color:#fff;">Final</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- modal crear inicio --}}
    <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Crear nuevo registro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="crearForm">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="crearRegistro">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal crear fin --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#crearRegistro').click(function () {
                $.ajax({
                    url: "{{ route('cronogramas.store') }}",
                    type: "POST",
                    data: $('#crearForm').serialize(),
                    success: function (response) {
                        $('#crearModal').modal('hide');
                        location.reload();
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorString = '';
                        $.each(errors, function (key, value) {
                            errorString += '<div class="alert alert-danger">' + value + '</div>';
                        });
                        $('#crearModal .modal-body').prepend(errorString);
                    }
                });
            });
        });

    </script>
@stop
