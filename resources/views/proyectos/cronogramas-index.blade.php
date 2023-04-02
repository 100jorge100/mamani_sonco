@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h5 class="text-center"><i>Cronograma de Actividades</i></h5>
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h5 class="page__heading"></h5>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-cronograma')
                            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-plus"> Agregar Actividad</i>
                            </button>
                            @endcan


                            <table id="tablaProyecto" class="table table-striped" style="width:100%">
                                <thead style="background-color:purple">
                                    <th style="color:blanchedalmond; font-size: 12px;"><i>#</i></th>
                                    <th style="color:blanchedalmond; font-size: 12px;"><i>Actividad</i></th>
                                    <th style="color:blanchedalmond; font-size: 12px;"><i>Fecha Inicio</i></th>
                                    <th style="color:blanchedalmond; font-size: 12px;"><i>Fecha Final</i></th>
                                    <th style="color:blanchedalmond; font-size: 12px;"><i>Estado</i></th>
                                    <th style="color:blanchedalmond; font-size: 12px;"><i>Descripcion</i></th>
                                    <th style="color:blanchedalmond; font-size: 12px;"><i>Acciones</i></th>
                                </thead>
                                <tbody>
                                    @foreach ($cronogramas as $dato)
                                        <tr>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $dato->id }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $dato->nombre }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $dato->fecha_inicio }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $dato->fecha_final }}</i></td>
                                            <td>
                                                @if ($dato->estado == 'desarrollo')
                                                    {{-- <button type="button" class="btn btn-warning">Desarrollo</button> --}}
                                                    <div class="fake-button-1"><i>Desarrollo</i></div>
                                                @endif
                                                @if ($dato->estado == 'pendiente')
                                                    {{-- <button type="button" class="btn btn-danger">Pendiente</button> --}}
                                                    <div class="fake-button-2"><i>Pendiente</i></div>
                                                @endif
                                                @if ($dato->estado == 'concluido')
                                                    {{-- <button type="button" class="btn btn-success">Concluido</button> --}}
                                                    <div class="fake-button-3"><i>Concluido</i></div>
                                                @endif
                                            </td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $dato->descripcion }}</i></td>
                                            <td>
                                                <button type="button" class="btn btn-dark botonEditar"
                                                    data-cronogramaid="{{ $dato->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>



                                                <!-- Botón de eliminar -->
                                                <button class="btn btn-danger btn-sm delete-btn"
                                                    data-id="{{ $dato->id }}"><i class="fas fa-trash"></i></button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- modal crear inicio --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cronogramas.store') }}" method="POST">
                        @csrf

                        <input	type="hidden" name="id_proyecto" value="{{$proyecto->id}}">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Ingrese el nombre">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                placeholder="Ingrese el descripcion">
                        </div>
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha_inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"
                                placeholder="Ingrese la fecha inicio">
                        </div>
                        <div class="form-group">
                            <label for="fecha_final">Fecha_final</label>
                            <input type="date" class="form-control" id="fecha_final" name="fecha_final"
                                placeholder="Ingrese la fecha final">
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-select" aria-label="Default select example" id="estado">
                                <option selected><i>Seleccione una opcion</i></option>
                                <option value="desarrollo">Desarrollo</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="concluido">Concluido</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="crudModal"></h4>
                </div>
                <div class="modal-body">
                    <form id="crud-form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese el descripcion">
                        </div>
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha_inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="Ingrese la fecha inicio">
                        </div>
                        <div class="form-group">
                            <label for="fecha_final">Fecha_final</label>
                            <input type="date" class="form-control" id="fecha_final" name="fecha_final" placeholder="Ingrese la fecha final">
                        </div>
                        <div class="form-group">
                            <label for="id_proyecto">Recurso</label>
                            <select name="id_proyecto" id="inputId_proyecto" class="form-control">
                                <option value="-- Escoja el recurso --"></option>
                                @foreach ($proyectos as $proyecto)
                                        <option value="{{ $proyecto['id'] }}">{{ $proyectop['nombre'] }}</option>
                                    @endforeach
                            </select>
                            </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Ingrese el estado">
                        </div>
                        <button type="submit" id="btn-save" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- modal crear fin --}}

    {{-- modal editar inicio --}}
    <div class="modal fade" id="ModalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i>
                            <h2>Editar un nueva Empresa</h2>
                        </i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                            @foreach ($errors->all() as $error)
                                <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="" method="POST" id='formEditar'>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- -->
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="nombre" class="form-control" id="nombre"
                                        placeholder="name@example.com">
                                    <label for="nombre"><i>Nombre</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="descripcion" class="form-control" id="descripcion"
                                        placeholder="name@example.com">
                                    <label for="descripcion"><i>Descripción</i></label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="date" name="fecha_inicio" class="form-control" id="fecha_inicio"
                                        placeholder="name@example.com">
                                    <label for="fecha_inicio"><i>fecha de inicio</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="date" name="fecha_final" class="form-control" id="fecha_final"
                                        placeholder="name@example.com">
                                    <label for="fecha_final"><i>E-mail</i></label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="estado" class="form-control" id="estado"
                                        placeholder="name@example.com">
                                    <label for="estado"><i>estado</i></label>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select name="estado" class="form-select" aria-label="Default select example" id="estado">
                                        <option selected><i>Seleccione una opcion</i></option>
                                        <option value="desarrollo">Desarrollo</option>
                                        <option value="pendiente">Pendiente</option>
                                        <option value="concluido">Concluido</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-dark">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal editar fin --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .fake-button-1 {
        display: inline-block;
        padding: 8px 16px;
        font-size: 12px;
        font-weight: bold;
        color: black;
        background-color: #f6a700;
        border: none;
        border-radius: 20px;
        }
        .fake-button-2 {
        display: inline-block;
        padding: 8px 16px;
        font-size: 12px;
        font-weight: bold;
        color: black;
        background-color: #e30032;
        border: none;
        border-radius: 20px;
        }
        .fake-button-3 {
        display: inline-block;
        padding: 8px 16px;
        font-size: 12px;
        font-weight: bold;
        color: black;
        background-color: #00a86b;
        border: none;
        border-radius: 20px;
        }
    </style>
    <style>
        .modal-header{
            background: purple;
            }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {
            $('#tablaProyecto').DataTable({
                "lengthMenu": [[5, 10, 50, -1],[5, 10, 50,"ALL"]],
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ Registros por pagina",
                        "zeroRecords": "El dato no existe",
                        "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "search": "Buscar",
                        "paginate": {
                            'next': 'Siguiente',
                            'previous': 'Anterior',
                        }
                    }
                });
            });
    </script>
    <script>//cript para crear
        $(document).ready(function () {
            // Abrir la ventana modal al hacer clic en el botón
            $('#create-new').click(function () {
                $('#crud-form').trigger("reset");
                $('#crudModal').html("Crear nuevo registro");
                $('#crud-modal').modal('show');
            });

            // Enviar datos del formulario mediante Ajax
            $('#btn-save').click(function (e) {
                e.preventDefault();
                $(this).html('Enviando...');
                $.ajax({
                    data: $('#crud-form').serialize(),
                    url: "{{ route('cronogramas.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#crud-form').trigger("reset");
                        $('#crud-modal').modal('hide');
                        alert('Registro creado exitosamente');
                        window.location.href = "{{ route('cronogramas.index') }}";
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#btn-save').html('Guardar');
                    }
                });
            });
        })
        //script para editar
        .on("click", ".botonEditar", function(e) {
                    e.preventDefault();
                    let idCronograma = $(this).data("cronogramaid")
                    // console.log(idEmpresa);
                    //peticion ajax
                    $.get("/cronogramas/" + idCronograma)
                        .done(function(data) {
                            // console.log(data);

                            if (data) {
                                // agarramos los valores
                                $("#formEditar #nombre").val(data.nombre);
                                $("#formEditar #descripcion").val(data.descripcion);
                                $("#formEditar #fecha_inicio").val(data.fecha_inicio);
                                $("#formEditar #fecha_final").val(data.fecha_final);
                                $("#formEditar #estado").val(data.estado);
                                $("#formEditar").attr("action", "{{ url('/') }}/cronogramas/" + data.id)

                                // abrir modal
                                let modal = document.getElementById("ModalEditar");
                                const miModal = new bootstrap.Modal(modal);
                                miModal.show();
                                // abrir modal
                            }
                    })

        });
    </script>
    <script>
        //script para eliminar
        $(document).ready(function() {
            // Cuando se hace clic en el botón de eliminar
            $('.delete-btn').click(function() {
                // Obtener el ID del registro
                var id = $(this).data('id');

                // Mostrar una ventana modal de confirmación utilizando SweetAlert2
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "No podrá revertir esta acción",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Enviar la petición de eliminación mediante Ajax
                        $.ajax({
                            url: '/cronogramas/' + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function() {
                                // Mostrar un mensaje de éxito
                                Swal.fire({
                                    title: 'Eliminado',
                                    text: 'El registro ha sido eliminado correctamente',
                                    icon: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    // Redireccionar al índice de registros
                                    window.location.href = '/cronogramas';
                                });
                            },
                            error: function() {
                                // Mostrar un mensaje de error
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Ha ocurrido un error al intentar eliminar el registro',
                                    icon: 'error',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@stop
