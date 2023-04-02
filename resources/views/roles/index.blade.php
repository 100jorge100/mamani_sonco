@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-rol')
                                {{-- <a class="btn btn-success" href="{{ route('roles.create') }}">Nuevo</a> --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fas fa-plus"> Agragar Rol</i>
                                </button>
                            @endcan


                            <table class="table table-striped mt-2">
                                <thead style="background-color:purple">
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Rol</i></th>
                                    <th><i style="color:blanchedalmond; font-size: 12px;">Acciones</i></th>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td><i style="color:blanchedalmond; font-size: 12px;">{{ $role->name }}</i></td>
                                            <td>
                                                <i style="color:blanchedalmond; font-size: 12px;">
                                                    @can('borrar-rol')
                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                        @can('editar-rol')
                                                            <a class="btn btn-success" href="{{ route('roles.edit', $role->id) }}"><i class="fas fa-pen"></i></a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                @endcan
                                                </i>
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
    {{-- crear rol inicio --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel"><i>Adicionar Roles</i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre del Rol:</label>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Permisos para este Rol:</label>
                                    <br/>
                                    @php $count = 0; @endphp
                                    @foreach($permission as $value)
                                    @if($count % 4 == 0)
                                        <div class="row">
                                            @endif
                                            <div class="col-md-3">
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                                    <label class="form-check-label" for="inlineCheckbox">{{ $value->name }}</label>
                                                </div>
                                            </div>
                                            @php $count++; @endphp
                                            @if($count % 4 == 0 || $loop->last)
                                        </div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
{{--
                        <div class="row">
                            <div class="form-group">
                                <select name="" id="select-permisos" multiple style="width:100%">
                                    @foreach($permission as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div> --}}
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    {{-- crear rol fin --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        .modal-header{
            background-color: purple;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script>
        console.log('Hi!');

        $(document).ready(function() {
            $('#select-permisos').select2({
                dropdownParent: $('#exampleModal .modal-body')
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stop
