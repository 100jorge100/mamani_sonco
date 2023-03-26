@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- lo activamos directo al adminlte.php @section('plugins.Sweetalert2', true) --}}

@section('content_header')
@stop

@section('content')
    <h5 class="text-center"><i>Administración de Usuarios</i></h5>
    {{-- <a class="btn btn-success mt-2 mb-2" href="{{ route('usuarios.create') }}">Nuevo</a>         --}}
    <!-- Button trigger modal agregar -->
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalCrear">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus"
            viewBox="0 0 16 16">
            <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
        <i>Agregar</i>
    </button>

    <table id="usuario" class="table table-striped display nowrap" style="width:100%">
        <thead style="background-color:#0e6a5af6">
            <th style="display: none;">ID</th>
            <th scope="col"><i style="font-size: 12px;">Usuario</i></th>
            <th scope="col"><i style="font-size: 12px;">E-mail</i></th>

            <th scope="col"><i style="font-size: 12px;">Nombre</i></th>
            <th scope="col"><i style="font-size: 12px;">Apellido Paterno</i></th>
            <th scope="col"><i style="font-size: 12px;">Apellido Materno</i></th>
            <th scope="col"><i style="font-size: 12px;">Fecha de Nacimiento</i></th>
            <th scope="col"><i style="font-size: 12px;">Telefono</i></th>
            <th scope="col"><i style="font-size: 12px;">Direccion</i></th>
            <th scope="col"><i style="font-size: 12px;">Sexo</i></th>
            <th scope="col"><i style="font-size: 12px;">Rol</i></th>
            <th scope="col"><i style="font-size: 12px;">Acciones</i></th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td style="dsplay: none;"><i>{{ $usuario->id }}</i></td>
                    <td><i style="font-size: 12px;">{{ $usuario->name }}</i></td><!-- usuario es enves de name muy aparte del nombre -->
                    <td><i style="font-size: 12px;">{{ $usuario->email }}</i></td>

                    <td><i style="font-size: 12px;">{{ $usuario->nombre }}</i></td>
                    <td><i style="font-size: 12px;">{{ $usuario->apellido_paterno }}</i></td>
                    <td><i style="font-size: 12px;">{{ $usuario->apellido_materno }}</i></td>
                    <td><i style="font-size: 12px;">{{ $usuario->fecha_nacimiento }}</i></td>
                    <td><i style="font-size: 12px;">{{ $usuario->telefono }}</i></td>
                    <td><i style="font-size: 12px;">{{ $usuario->direccion }}</i></td>
                    <td><i style="font-size: 12px;">{{ $usuario->sexo }}</i></td>

                    <td style="font-size: 12px;">
                        @if (!empty($usuario->getRoleNames()))
                            @foreach ($usuario->getRoleNames() as $rolNombre)
                                <h5><span class="badge badge-dark"><i style="font-size: 12px;">{{ $rolNombre }}</i></span></h5>
                            @endforeach
                        @endif
                    </td>

                    {{-- <td>{{ $usuario->estado }}</td> --}}

                    <td>

                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="formulario-eliminar">
                            <a class="btn btn-dark btn-move btn-sm" href="{{ route('usuarios.edit', $usuario->id) }}"><span
                                    class="fa fa-pen"></span></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark btn-move btn-sm ">
                                <span class="fa fa-trash"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal crear inicio -->
    <div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i>Agregar un Nuevo Usuario</i></h5>
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

                    <form action="{{ route('usuarios.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <label for=""><i style="color:rgb(13, 114, 114)">Registre Usuario y
                                    Contraseña</i></label>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="formFile"><i>Usuario</i></label>
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="email"><i>E-mail</i></label>
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="password"><i>Password</i></label>
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="confirm-password"><i>Confirmar Password</i></label>
                                        {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <label for=""><i style="color:rgb(13, 114, 114)">Registrar Datos Personales</i></label>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre"><i>Nombre</i></label>
                                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="apellido_paterno"><i>Apellido paterno</i></label>
                                        {!! Form::text('apellido_paterno', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="apellido_materno"><i>Apellido materno</i></label>
                                        {!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="fecha_nacimiento"><i>Fecha nacimiento</i></label>
                                        {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="telefono"><i>telefono</i></label>
                                        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="direccion"><i>Direccion</i></label>
                                        {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="sexo"><i>Sexo</i></label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                                                name="sexo" id="sexoM" value="M"
                                                {{ old('sexo') == 'M' ? 'checked' : '' }}>
                                            <label for="sexoM" class="form-check-label"><i>Masculino</i></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                                                name="sexo" id="sexoF" value="F"
                                                {{ old('sexo') == 'F' ? 'checked' : '' }}>
                                            <label for="sexoF" class="form-check-label"><i>Femenino</i></label>
                                            @error('sexo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for=""><i>Roles</i></label>
                                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i>Cancelar</i></button>
                                <button type="submit" class="btn btn-primary"><i>Guardar</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal crear fin -->
    <div class="modal fade" id="ModalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i>
                            <h2>Editar un Usuario</h2>
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
                            <label for=""><i style="color:rgb(13, 114, 114)">Registre Usuario y
                                Contraseña</i></label>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="name@example.com">
                                    <label for="name"><i>Usuario</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="name@example.com">
                                    <label for="email"><i>Descripción</i></label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="name@example.com">
                                    <label for="password"><i>Password</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="confirm-password" name="confirm-password" class="form-control" id="confirm-password"
                                        placeholder="name@example.com">
                                    <label for="confirm-password"><i>Confirm Password</i></label>
                                </div>
                            </div>
                            <label for=""><i style="color:rgb(13, 114, 114)">Registrar Datos Personales</i></label>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="nombre" class="form-control" id="nombre"
                                        placeholder="name@example.com">
                                    <label for="nombre"><i>nombre</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="apellido_paterno" class="form-control" id="apellido_paterno"
                                        placeholder="name@example.com">
                                    <label for="apellido_paterno"><i>Apellido Paterno</i></label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="nombre" class="form-control" id="nombre"
                                        placeholder="name@example.com">
                                    <label for="nombre"><i>nombre</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="apellido_paterno" class="form-control" id="apellido_paterno"
                                        placeholder="name@example.com">
                                    <label for="apellido_paterno"><i>Apellido Paterno</i></label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <input type="text" name="apellido_materno" class="form-control" id="apellido_materno"
                                        placeholder="name@example.com">
                                    <label for="apellido_materno"><i>Apellido Materno</i></label>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento"
                                        placeholder="name@example.com">
                                    <label for="fecha_nacimiento"><i>Fecha Nacimiento</i></label>
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
                                    <label for="direccion"><i>Direccion</i></label>
                                </div>
                            </div>
                            <div class="rowg-2">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                                    name="sexo" id="sexoM" value="M" {{ old( 'sexo' ) == 'M' ? 'checked' : '' }}>
                                    <label for="sexoM" class="form-check-label">Masculino</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                                    name="sexo" id="sexoF" value="F" {{ old( 'sexo' ) == 'F' ? 'checked' : '' }}>
                                    <label for="sexoF" class="form-check-label">Femenino</label>
                                    @error('sexo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="">Roles</label>
                                        {{-- {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal editar inicio -->

    <!-- Modal editar fin -->
@stop
@section('css')
    {{-- <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.1/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    {{-- <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
            $(document).ready(function() {
                var table = $('#usuario').DataTable( {
                    responsive: true
                } );

                new $.fn.dataTable.FixedHeader( table );
            } );
        $(document).ready(function() {
            $('#').DataTable({
                "lengthMenu": [[10, 50, -1],[10, 50, "ALL"]],
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
                },
                scrollY: 400,
                scrollX: true,
            });
        });
    </script>

    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
        });
    </script>
@stop
