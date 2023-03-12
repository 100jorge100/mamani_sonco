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
        <thead style="background-color:#19d3b4f6">
            <th style="background-color: rgb(102, 255, 153);">ID</th>
            <th scope="col"><i>Usuario</i></th>
            <th scope="col"><i>E-mail</i></th>

            <th scope="col"><i>Nombre</i></th>
            <th scope="col"><i>Apellido Paterno</i></th>
            <th scope="col"><i>Apellido Materno</i></th>
            <th scope="col"><i>Fecha de Nacimiento</i></th>
            <th scope="col"><i>Telefono</i></th>
            <th scope="col"><i>Direccion</i></th>
            <th scope="col"><i>Sexo</i></th>
            <th scope="col"><i>Rol del Funcionari</i></th>
            <th scope="col"><i>Acciones</i></th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td style="background-color: rgb(102, 255, 153);"><i>{{ $usuario->id }}</i></td>
                    <td><i>{{ $usuario->name }}</i></td><!-- usuario es enves de name muy aparte del nombre -->
                    <td><i>{{ $usuario->email }}</i></td>

                    <td><i>{{ $usuario->nombre }}</i></td>
                    <td><i>{{ $usuario->apellido_paterno }}</i></td>
                    <td><i>{{ $usuario->apellido_materno }}</i></td>
                    <td><i>{{ $usuario->fecha_nacimiento }}</i></td>
                    <td><i>{{ $usuario->telefono }}</i></td>
                    <td><i>{{ $usuario->direccion }}</i></td>
                    <td><i>{{ $usuario->sexo }}</i></td>

                    <td>
                        @if (!empty($usuario->getRoleNames()))
                            @foreach ($usuario->getRoleNames() as $rolNombre)
                                <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                            @endforeach
                        @endif
                    </td>

                    {{-- <td>{{ $usuario->estado }}</td> --}}

                    <td>

                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                            class="formulario-eliminar">
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
                                        <label for="formFile">Usuario</label>
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}  
                                        <label for="formFile" class="form-label">Default file input example</label>
                                        <input class="form-control" type="file" id="formFile"> 
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="confirm-password">Confirmar Password</label>
                                        {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <label for=""><i style="color:rgb(13, 114, 114)">Registrar Datos Personales</i></label>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido_paterno</label>
                                        {!! Form::text('apellido_paterno', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido_materno</label>
                                        {!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="fecha_nacimiento">Fecha_nacimiento</label>
                                        {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="telefono">telefono</label>
                                        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="direccion">Direccion</label>
                                        {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">
                                    <div class="form-group">
                                        <label for="sexo">Sexo</label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                                                name="sexo" id="sexoM" value="M"
                                                {{ old('sexo') == 'M' ? 'checked' : '' }}>
                                            <label for="sexoM" class="form-check-label">Masculino</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input @error('sexo') is-invalid @enderror"
                                                name="sexo" id="sexoF" value="F"
                                                {{ old('sexo') == 'F' ? 'checked' : '' }}>
                                            <label for="sexoF" class="form-check-label">Femenino</label>
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
                                        <label for="">Roles</label>
                                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md form-floating mb-3">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
<!-- Modal crear fin -->
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        div.dataTables_wrapper {
            width: 100%;
            margin: 1 auto;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#usuario').DataTable({
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
        $(' .formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Seguro que desea eliminar?',
                text: "El usuario sera !ELIMINADO¡ definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'Cancelar!'
            }).then((result) => {
                if (result.value) {
                    //Swal.fire(
                    //  'Deleted!',
                    //  'Your file has been deleted.',
                    //  'success'
                    //)
                    this.submit();
                }
            })
        });
    </script>
@stop
