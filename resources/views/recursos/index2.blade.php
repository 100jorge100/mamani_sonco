@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>Gestion de Recursos</h3>
@stop

@section('content')
{{-- Add Modal --}}
<div class="modal fade" id="AddRecursoModal" tabindex="-1" aria-labelledby="AddRecursoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddRecursoModalLabel">Agregar Recurso</h5>
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
                    <label for="">Gestion</label>
                    <input type="date" required class="gestion form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Monto</label>
                    <input type="text" required class="monto form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Estado</label>
                    <input type="text" required class="estado form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_recurso">Save</button>
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
                <h5 class="modal-title" id="editModalLabel">Editar Recuros</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="recu_id" />

                <div class="form-group mb-3">
                    <label for="">Nombre</label>
                    <input type="text" id="nombre" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Descripcion</label>
                    <input type="text" id="descripcion" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Gestion</label>
                    <input type="date" id="gestion" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Monto</label>
                    <input type="text" id="monto" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Estado</label>
                    <input type="text" id="estado" required class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary update_recurso">Actualizar</button>
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
                <button type="button" class="btn btn-primary delete_recurso">Yes Delete</button>
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
                            data-bs-target="#AddRecursoModal"><i class="fas fa-plus">Agragar Recurso</i></button>
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
                                <th>Gestion</th>
                                <th>Monto</th>
                                <th>Estado</th>
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
                    url: "/fetch-recursos",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('tbody').html("");
                        $.each(response.recursos, function (key, item) {
                            $('tbody').append('<tr>\
                                <td>' + item.id + '</td>\
                                <td>' + item.nombre + '</td>\
                                <td>' + item.descripcion + '</td>\
                                <td>' + item.gestion + '</td>\
                                <td>' + item.monto + '</td>\
                                <td>' + item.estado + '</td>\
                                <td>@can('editar-recurso')<button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm"><i class="fas fa-pen"></i></button>@endcan @can('eliminar-recurso')<button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm"><i class="fas fa-trash"></i></button>@endcan</td>\
                            \</tr>');
                        });
                    }
                });
            }

            $(document).on('click', '.add_recurso', function (e) {
                e.preventDefault();

                $(this).text('Sending..');

                var data = {
                    'nombre': $('.nombre').val(),
                    'descripcion': $('.descripcion').val(),
                    'gestion': $('.gestion').val(),
                    'monto': $('.monto').val(),
                    'estado': $('.estado').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/recursos",
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
                            $('.add_recurso').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddRecursoModal').find('input').val('');
                            $('.add_recurso').text('Save');
                            $('#AddRecursoModal').modal('hide');
                            fetchstudent();
                            toastr.success('El Registro se Creo Exitosamente','Success');
                        }
                    }
                });

            });

            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var recu_id = $(this).val();
                // alert(recu_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-recurso/" + recu_id,
                    success: function (response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            // console.log(response.student.name);
                            $('#nombre').val(response.recurso.nombre);
                            $('#descripcion').val(response.recurso.descripcion);
                            $('#gestion').val(response.recurso.gestion);
                            $('#monto').val(response.recurso.monto);
                            $('#estado').val(response.recurso.estado);
                            $('#recu_id').val(recu_id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_recurso', function (e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#recu_id').val();
                // alert(id);

                var data = {
                    'nombre': $('#nombre').val(),
                    'descripcion': $('#descripcion').val(),
                    'gestion': $('#gestion').val(),
                    'monto': $('#monto').val(),
                    'estado': $('#estado').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-recurso/" + id,
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
                            $('.update_recurso').text('Update');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_recurso').text('Update');
                            $('#editModal').modal('hide');
                            fetchstudent();
                            toastr.success('El Registro se Actualizo Exitosamente','Success');
                        }
                    }
                });

            });

            $(document).on('click', '.deletebtn', function () {
                var recu_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(recu_id);
            });

            $(document).on('click', '.delete_recurso', function (e) {
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
                    url: "/delete-recurso/" + id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_recurso').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_recurso').text('Yes Delete');
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
