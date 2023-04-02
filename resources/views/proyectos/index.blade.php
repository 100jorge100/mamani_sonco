@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h2 class="page__heading">Gestion De Proyectos</h2>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-blog')
                                {{-- <a class="btn btn-dark" href="{{ route('proyectos.create') }}" ><i class="fa fa-plus" aria-hidden="true">    Agregar Nuevo Proyecto</i></a>  --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalCrear">
                                    Agregar
                                </button>
                            @endcan

                            <table class="table table-striped table-bordered shadow-lg mt-4 display responsive nowrap"
                            style="width:100%"
                             id="proyectos">
                                <thead style="background-color:purple">
                                    <th><i style="color:blanchedalmond; font-size: 12px;">#</i></th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Nombre</i></th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Descripción</i> </th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Comunidad</i></th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Recursos</i></th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Empresa</i></th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Categoria</i></th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Inicio</i></th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Final</i></th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Estado</i></th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Acciones</i></th>
                                </thead>
                                <tbody>
                                    @foreach ($proyectos as $proyecto)
                                        <tr>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $proyecto->id }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $proyecto->nombre }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $proyecto->descripcion }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $proyecto->comunidads->nombre }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $proyecto->recursos->nombre }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $proyecto->empresas->nombre }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $proyecto->categorias->nombre }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $proyecto->fecha_inicio }}</i></td>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $proyecto->fecha_final }}</i></td>
                                            <td>
                                                @if ($proyecto->estado == 'activo')
                                                    <button type="button" class="btn btn-success">Activo</button>
                                                @endif
                                                @if ($proyecto->estado == 'inactivo')
                                                    <button type="button" class="btn btn-secondary">Inactivo</button>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('proyectos.destroy', $proyecto->id) }}"
                                                    method="POST">
                                                    @can('editar-proyecto')
                                                        <a class="btn btn-success btnEditarProyecto"
                                                            href="{{ route('proyectos.edit', $proyecto->id) }}">
                                                            <i class="fas fa-solid fa-pen"></i>
                                                        </a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-proyecto')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-solid fa-trash"></i>
                                                        </button>
                                                    @endcan
                                                    <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-info"><i class="fas fa-solid fa-chart-line"></i></a>
                                                    <a href="#" class="btn btn-warning"><i class="fas fa-regular fa-file-pdf"></i></a>
                                                </form>
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
    <!-- Modal crear inicio -->
    <div class="modal fade" id="ModalCrear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
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

                    <form action="{{ route('proyectos.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre del Proyecto</label>
                                        <input type="text" name="nombre" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="id_comunidad">Comunidad</label>
                                        <select name="id_comunidad" id="inputId_categoria" class="form-control">
                                            <option value="-- Escoja la Comunidad --"></option>
                                            @foreach ($comunidads as $comunidad)
                                                <option value="{{ $comunidad['id'] }}">{{ $comunidad['nombre'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="id_recurso">Recurso</label>
                                        <select name="id_recurso" id="inputId_recurso" class="form-control">
                                            <option value="-- Escoja el recurso --"></option>
                                            @foreach ($recursos as $recurso)
                                                <option value="{{ $recurso['id'] }}">{{ $recurso['nombre'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="id_empresa">Empresas</label>
                                        <select name="id_empresa" id="inputId_empresa" class="form-control">
                                            <option value="-- Escoja la empresa --"></option>
                                            @foreach ($empresas as $empresa)
                                                <option value="{{ $empresa['id'] }}">{{ $empresa['nombre'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="id_categoria">Categoria</label>
                                        <select name="id_categoria" id="inputId_categoria" class="form-control">
                                            <option value="-- Escoja la categoria --"></option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="fecha_inicio">Fecha de Inicio</label>
                                        <input type="date" name="fecha_inicio" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="fecha_final">Fecha de Final</label>
                                        <input type="date" name="fecha_final" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select name="estado" class="form-select" aria-label="Default select example" id="estado">
                                            {{-- <option selected><i>Seleccione una opcion</i></option> --}}
                                            <option value="ACTIVO">Activo</option>
                                            {{-- <option value="INACTIVO">Inactivo</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--crear final-->





    <div class="modal fade" id="ModalEditarProyecto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">


                </div>
            </div>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            $('#proyectos').DataTable({
                    responsive: true,
                    autoWidth: false,
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "zeroRecords": "No se encontraron resultados en su busqueda",
                        "searchPlaceholder": "Buscar registros",
                        "info": "Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "No existen registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "search": "Buscar:",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                    }
                })
                .on("click", ".btnEditarProyecto", function(e) {
                    e.preventDefault(); //prevenir que se vaya a otra vista
                    let url = $(this).attr("href");
                    // console.log("click", url);
                    $("#modal-body").html("");

                    $.get(url, {}, )
                        .done(function(data) {
                            console.log(data);
                            if (data.vista) {
                                $("#modal-body").html(data.vista);
                                let modal = document.getElementById("ModalEditarProyecto");
                                const miModal = new bootstrap.Modal(modal);
                                miModal.show();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Algo salio mal!, Intente nuevamente',
                                })
                            }
                        })
                        .fail(function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Algo salio mal!, Intente nuevamente',
                            })
                        })

                })
        });
    </script>
@stop
