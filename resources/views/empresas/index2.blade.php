@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>Gestion de Recursos</h3>
@stop

@section('content')
{{-- Add Modal --}}
<div class="modal fade" id="AddEmpresaModal" tabindex="-1" aria-labelledby="AddEmpresaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddEmpresaModalLabel">Agregar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>

                <div class="form-group mb-3">
                    <label for="">Nombre</label>
                    <input type="text" required class="nombre form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">descripcion</label>
                    <input type="text" required class="descripcion form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">sigla</label>
                    <input type="text" required class="sigla form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">email</label>
                    <input type="email" required class="email form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">telefono</label>
                    <input type="text" required class="telefono form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">direccion</label>
                    <input type="text" required class="direccion form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">direccion_web</label>
                    <input type="text" required class="direccion_web form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">nit</label>
                    <input type="text" required class="nit form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">estado</label>
                    <input type="text" required class="estado form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_empresa">Save</button>
            </div>

        </div>
    </div>
</div>
{{-- End add modal --}}

{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="empre_id" />

                <div class="form-group mb-3">
                    <label for="">Nombre</label>
                    <input type="text" id="nombre" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Descripcion</label>
                    <input type="text" id="descripcion" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">sigla</label>
                    <input type="text" id="sigla" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">email</label>
                    <input type="email" id="email" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">telefono</label>
                    <input type="text" id="telefono" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">direccion</label>
                    <input type="text" id="direccion" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">direccion_web</label>
                    <input type="text" id="direccion_web" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">nit</label>
                    <input type="text" id="nit" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Estado</label>
                    <input type="text" id="estado" required class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary update_empresa">Actualizar</button>
            </div>

        </div>
    </div>
</div>
{{-- Edn- Edit Modal --}}


{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Confirm to Delete Data ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_empresa">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

{{-- Tabla index2 recursos --}}
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        @can('crear-recurso')
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#AddEmpresaModal"><i class="fas fa-plus">Agragar empresa</i></button>
                        @endcan

                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead style="background-color:purple">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>sigla</th>
                                <th>email</th>
                                <th>telefono</th>
                                <th>direccion</th>
                                <th>direccion_Web</th>
                                <th>nit</th>
                                <th>estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Tabla index2 final --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            fetchstudent();
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

            function fetchstudent() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-empresas",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('tbody').html("");
                        $.each(response.empresas, function (key, item) {
                            $('tbody').append('<tr>\
                                <td>' + item.id + '</td>\
                                <td>' + item.nombre + '</td>\
                                <td>' + item.descripcion + '</td>\
                                <td>' + item.sigla + '</td>\
                                <td>' + item.email + '</td>\
                                <td>' + item.telefono + '</td>\
                                <td>' + item.direccion + '</td>\
                                <td>' + item.direccion_web + '</td>\
                                <td>' + item.nit + '</td>\
                                <td>' + item.estado + '</td>\
                                <td>@can('editar-empresa')<button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm"><i class="fas fa-pen"></i></button>@endcan @can('eliminar-empresa')<button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm"><i class="fas fa-trash"></i></button>@endcan</td>\
                            \</tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.add_empresa', function (e) {
                e.preventDefault();

                $(this).text('Sending..');

                var data = {
                    'nombre': $('.nombre').val(),
                    'descripcion': $('.descripcion').val(),
                    'sigla': $('.sigla').val(),
                    'email': $('.email').val(),
                    'telefono': $('.telefono').val(),
                    'direccion': $('.direccion').val(),
                    'direccion_web': $('.direccion_web').val(),
                    'nit': $('.nit').val(),
                    'estado': $('.estado').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/empresas",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.add_empresa').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddEmpresaModal').find('input').val('');
                            $('.add_empresa').text('Save');
                            $('#AddEmpresaModal').modal('hide');
                            fetchstudent();
                            toastr.success('La Empresa se Creo Exitosamente','Success');
                        }
                    }
                });

            });

            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var empre_id = $(this).val();
                // alert(empre_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-empresa/" + empre_id,
                    success: function (response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            // console.log(response.student.name);
                            $('#nombre').val(response.empresa.nombre);
                            $('#descripcion').val(response.empresa.descripcion);
                            $('#sigla').val(response.empresa.sigla);
                            $('#email').val(response.empresa.email);
                            $('#telefono').val(response.empresa.telefono);
                            $('#direccion').val(response.empresa.direccion);
                            $('#direccion_web').val(response.empresa.direccion_web);
                            $('#nit').val(response.empresa.nit);
                            $('#estado').val(response.empresa.estado);
                            $('#empre_id').val(empre_id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_empresa', function (e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#empre_id').val();
                // alert(id);

                var data = {
                    'nombre': $('#nombre').val(),
                    'descripcion': $('#descripcion').val(),
                    'sigla': $('#sigla').val(),
                    'email': $('#email').val(),
                    'telefono': $('#telefono').val(),
                    'direccion': $('#direccion').val(),
                    'direccion_web': $('#direccion_web').val(),
                    'nit': $('#nit').val(),
                    'estado': $('#estado').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-empresa/" + id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#update_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.update_empresa').text('Update');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_empresa').text('Update');
                            $('#editModal').modal('hide');
                            fetchstudent();
                            toastr.success('El Registro se Actualizo Exitosamente','Success');
                        }
                    }
                });

            });

            $(document).on('click', '.deletebtn', function () {
                var empre_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(empre_id);
            });

            $(document).on('click', '.delete_empresa', function (e) {
                e.preventDefault();

                $(this).text('Deleting..');
                var id = $('#deleteing_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/delete-empresa/" + id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_empresa').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_empresa').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchstudent();
                            toastr.success('El Registro se Elimino exitosamente','Success');
                        }
                    }
                });
            });

        });

    </script>

@stop
