@extends('adminlte::page')

@section('title', 'JLMS')

@section('content_header')
    <h1 class="text-center"><i>Catalogo De Empresas</i></h1>
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <!--<h3 class="page__heading">Gestion De Proyectos</h3>-->
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-empresa')
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalCrear">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-plus" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                    Agragar
                                </button>
                            @endcan
                            <br><br>

                            <table id="empresa"
                                class="table table-striped table-bordered shadow-lg mt-4 display responsive nowrap"
                                style="width:100%">
                                <thead style="background-color:#115851f6">
                                    <th style="display: none;">#</th>
                                    <th style="color:#0a0707;">Nombre</th>

                                    <th style="color:#0a0707;">Sigla</th>
                                    <th style="color:#0a0707;">E-mail</th>
                                    <th style="color:#0a0707;">Telefono</th>
                                    <th style="color:#0a0707;">Dirección</th>
                                    <th style="color:#0a0707;">Dirección Web</th>
                                    <th style="color:#0a0707;">Nit</th>
                                    <th style="color:#0a0707;">Estado</th>
                                    <th style="color:#0a0707;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($empresas as $empresa)
                                        <tr>
                                            <td style="display: none;">{{ $empresa->id }}</td>
                                            <td>{{ $empresa->nombre }}</td>

                                            <td>{{ $empresa->sigla }}</td>
                                            <td>{{ $empresa->email }}</td>
                                            <td>{{ $empresa->telefono }}</td>
                                            <td>{{ $empresa->direccion }}</td>
                                            <td>{{ $empresa->direccion_web }}</td>
                                            <td>{{ $empresa->nit }}</td>
                                            <td>
                                                @if ($empresa->estado == 'desarrollo')
                                                    <button type="button" class="btn btn-warning">Desarrollo</button>
                                                @endif
                                                @if ($empresa->estado == 'pendiente')
                                                    <button type="button" class="btn btn-danger">Pendiente</button>
                                                @endif
                                                @if ($empresa->estado == 'concluido')
                                                    <button type="button" class="btn btn-success">Concluido</button>
                                                @endif
                                            </td>
                                            <td>
                                                @can('editar-empresa')
                                                    <button type="button" class="btn btn-dark botonEditar"
                                                        data-empresaId="{{ $empresa->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                @endcan
                                                <button type="button" class="btn btn-info botonVer"
                                                    data-empresaId="{{ $empresa->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <form action="{{ route('empresas.destroy', $empresa->id) }}"
                                                    class="d-inline formulario-eliminar" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-empresa')
                                                        <button type="submit" class="btn btn-dark">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    @endcan
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

    <!-- Modal crear inicio-->
    <div class="modal fade" id="ModalCrear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i>
                            <h2>Agregue un nueva Empresa</h2>
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

                    <form action="{{ route('empresas.store') }}" method="POST">
                        @csrf
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
                                    <input type="text" name="sigla" class="form-control" id="sigla"
                                        placeholder="name@example.com">
                                    <label for="sigla"><i>Sigla</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="name@example.com">
                                    <label for="email"><i>E-mail</i></label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="telefono" class="form-control" id="telefono"
                                        placeholder="name@example.com">
                                    <label for="telefono"><i>Telefono</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="direccion" class="form-control" id="direccion"
                                        placeholder="name@example.com">
                                    <label for="direccion"><i>direccion</i></label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="direccion_web" class="form-control" id="direccion_web"
                                        placeholder="name@example.com">
                                    <label for="direccion_web"><i>Dirección Web</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="nit" class="form-control" id="nit"
                                        placeholder="name@example.com">
                                    <label for="nit"><i>Nit</i></label>
                                </div>
                                <div class="col-md form-floating mb-3 ">
                                    <select name="estado" class="form-select" aria-label="Default select example"
                                        id="estado">
                                        <option selected><i>Seleccione una opcion</i></option>
                                        <option value="desarrollo">Desarrollo</option>
                                        <option value="pendiente">Pendiente</option>
                                        <option value="concluido">Concluido</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-dark">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal crear fin-->


    <!-- Modal editar inicio-->
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
                                    <input type="text" name="sigla" class="form-control" id="sigla"
                                        placeholder="name@example.com">
                                    <label for="sigla"><i>Sigla</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="name@example.com">
                                    <label for="email"><i>E-mail</i></label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="telefono" class="form-control" id="telefono"
                                        placeholder="name@example.com">
                                    <label for="telefono"><i>Telefono</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="direccion" class="form-control" id="direccion"
                                        placeholder="name@example.com">
                                    <label for="direccion"><i>direccion</i></label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="direccion_web" class="form-control" id="direccion_web"
                                        placeholder="name@example.com">
                                    <label for="direccion_web"><i>Dirección Web</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="nit" class="form-control" id="nit"
                                        placeholder="name@example.com">
                                    <label for="nit"><i>Nit</i></label>
                                </div>
                                <div class="col-md form-floating mb-3 ">
                                    <select name="estado" class="form-select" aria-label="Default select example"
                                        id="estado">
                                        <option selected><i>Seleccione una opcion</i></option>
                                        <option value="desarrollo">Desarrollo</option>
                                        <option value="pendiente">Pendiente</option>
                                        <option value="concluido">Concluido</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-dark">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ver fin-->

    <!-- Modal editar inicio-->
    <div class="modal fade" id="ModalVer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i>
                            <h2 id="nombreEmpresa"></h2>
                        </i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <table class="table  table-hover">

                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                            </tr>

                        </thead>
                        <tbody id="tbodyVer">

                        </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>
    <!-- Modal ver fin-->


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table {
            width: 100%;
            border: 1px solid #000;
        }

        th,
        td {
            width: 25%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
        }

        caption {
            padding: 0.3em;
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
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'El Usuario se elimino con exito.',
                'success'
            )
        </script>
    @endif
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Esta seguro de que desea eliminar?',
                text: "Si no esta seguro puede precionar el boton cancelar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok, Eliminar    '
            }).then((result) => {
                if (result.isConfirmed) {
                    /*Swal.fire(
                    'Eliminado!',
                    'A sido eliminado exitosamente.',
                    'success'
                    )*/
                    this.submit();
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#empresa').DataTable({
                    "lengthMenu": [
                        [5, 10, 50, -1],
                        [5, 10, 50, "ALL"]
                    ],
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ Registros por pagina",
                        "zeroRecords": "El dato no existe",
                        "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "search": "Buscar",
                        "paginate": {
                            'next': 'Siguiente',
                            'previous': 'Anterior'
                        }
                    }
                })
                .on("click", ".botonEditar", function(e) {
                    e.preventDefault();


                    let idEmpresa = $(this).data("empresaid")
                    // console.log(idEmpresa);




                    //peticion ajax
                    $.get("/empresas/" + idEmpresa)
                        .done(function(data) {
                            // console.log(data);



                            if (data) {

                                // agarramos los valores



                                $("#formEditar #descripcion").val(data.descripcion);
                                $("#formEditar #direccion").val(data.direccion);

                                $("#formEditar #direccion_web").val(data.direccion_web);
                                $("#formEditar #email").val(data.email);
                                $("#formEditar #nit").val(data.nit);
                                $("#formEditar #nombre").val(data.nombre);
                                $("#formEditar #sigla").val(data.sigla);
                                $("#formEditar #telefono").val(data.telefono);

                                $("#formEditar #estado option[value='" + data.estado + "']").attr(
                                    "selected", true)

                                $("#formEditar").attr("action", "{{ url('/') }}/empresas/" + data.id)



                                // abrir modal
                                let modal = document.getElementById("ModalEditar");
                                const miModal = new bootstrap.Modal(modal);
                                miModal.show();
                                // abrir modal


                            }
                        })

                })
                .on("click", ".botonVer", function(e) {
                    e.preventDefault();

                    let idEmpresa = $(this).data("empresaid")
                    // console.log(idEmpresa);

                    $.get("/empresas/" + idEmpresa)
                        .done(function(data) {
                            // console.log(data);

                            if (data) {

                                $("#tbodyVer").empty();


                                $("#nombreEmpresa").text("Ver detalles de "+data.nombre);

                                $("#tbodyVer").append("<tr><td>Nombre</td><td>" + data.nombre +
                                    "</td></tr>");
                                $("#tbodyVer").append("<tr><td>Sigla</td><td>" + data.sigla + "</td></tr>");
                                $("#tbodyVer").append("<tr><td>Nit</td><td>" + data.nit + "</td></tr>");
                                $("#tbodyVer").append("<tr><td>Descripcion</td><td>" + data.descripcion +
                                    "</td></tr>");
                                $("#tbodyVer").append("<tr><td>Direccion</td><td>" + data.direccion +
                                    "</td></tr>");
                                $("#tbodyVer").append("<tr><td>Telefono</td><td>" + data.telefono +
                                    "</td></tr>");
                                $("#tbodyVer").append("<tr><td>Email</td><td>" + data.email + "</td></tr>");
                                $("#tbodyVer").append("<tr><td>Direccion Web</td><td>" + data
                                    .direccion_web + "</td></tr>");
                                $("#tbodyVer").append("<tr><td>Estado</td><td>" + data.estado +
                                    "</td></tr>");

                                let modal = document.getElementById("ModalVer");
                                const miModal = new bootstrap.Modal(modal);
                                miModal.show();
                            }
                        })
                })

        });
    </script>
@stop
