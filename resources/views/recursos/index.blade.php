@extends('adminlte::page')

@section('title', 'JLMS')

@section('content_header')
    <h1 class="text-center"><i>Fondos Monetarios</i></h1>
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
            
        
                    @can('crear-recurso')
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalCrear">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                           <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        Agragar
                    </button>
                    @endcan
                    <br><br>
        
                    <table id="recurso" class="table table-striped table-bordered shadow-lg mt-4 display responsive nowrap" style="width:100%">
                            <thead style="background-color:#115851f6">        
                                <th style="display: none;">#</th>                             
                                <th style="color:#0a0707;">Nombre</th>  
                                <th style="color:#0a0707;">Descripción</th>
                                <th style="color:#0a0707;">Gestion</th>                                    
                                <th style="color:#0a0707;">Monto</th>
                                <th style="color:#0a0707;">Estado</th>
                                <th style="color:#0a0707;">Acciones</th>                                                                   
                            </thead>
                            <tbody>
                                @foreach ($recursos as $recurso)
                                <tr>
                                    <td style="display: none;">{{ $recurso->id }}</td>                                
                                    <td>{{ $recurso->nombre }}</td>
                                    <td>{{ $recurso->descripcion }}</td>
                                    <td>{{ $recurso->gestion }}</td>
                                    <td>{{ $recurso->monto }}</td>
                                    <td>
                                        @if ($recurso->estado == 'desarrollo')
                                            <button type="button" class="btn btn-warning">Desarrollo</button>
                                        @endif
                                        @if ($recurso->estado == 'pendiente')
                                            <button type="button" class="btn btn-danger">Pendiente</button>
                                        @endif
                                        @if ($recurso->estado == 'concluido')
                                            <button type="button" class="btn btn-success">Concluido</button>
                                        @endif
                                    </td>
                                    <td>
                                        @can('editar-recurso')
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $recurso->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg>
                                                </button>
                                                <!-- Modal editar inicio-->
                                                    <div class="modal fade" id="exampleModal{{ $recurso->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('recursos.update',$recurso->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <div class="row g-2">
                                                                            <div class="col-md form-floating mb-3">
                                                                                <input type="text" name="nombre" class="form-control" id="exampleModalLabel" value="{{ $recurso->nombre }}">
                                                                                <label for="exampleModalLabel"><i>Nombre</i></label>
                                                                            </div>
                                                                            <div class="col-md form-floating mb-3">
                                                                                <input type="text" name="descripcion" class="form-control" id="exampleModalLabel" value="{{ $recurso->descripcion }}">
                                                                                <label for="exampleModalLabel"><i>Descripción</i></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-2">
                                                                            <div class="col-md form-floating mb-3">
                                                                                <input type="date" name="gestion" class="form-control" id="exampleModalLabel" value="{{ $recurso->gestion }}">
                                                                                <label for="exampleModalLabel"><i>Gestion</i></label>
                                                                            </div>
                                                                            <div class="col-md form-floating mb-3">
                                                                                <input type="text" name="monto" class="form-control" id="exampleModalLabel" value="{{ $recurso->monto }}">
                                                                                <label for="exampleModalLabel"><i>Monto</i></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="estado">Estado</label>
                                                                                <input type="text" name="estado" class="form-control" value="{{ $recurso->estado }}">
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
                                            @endcan
                                        <form action="{{ route('recursos.destroy', $recurso->id) }}" class="d-inline formulario-eliminar" method="POST">      
                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-recurso')
                                            <button type="submit" class="btn btn-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                            </svg>
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
  <div class="modal fade" id="ModalCrear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header"> 
          <h5 class="modal-title" id="staticBackdropLabel"><i><h2>Agregue un nueva Recurso</h2></i></h5>
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
    
        <form action="{{ route('recursos.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- -->
                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="name@example.com" value="">
                        <label for="floatingInput"><i>Nombre</i></label>
                    </div>
                    <div class="col-md form-floating mb-3">
                        <input type="text" name="descripcion" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput"><i>Descripción</i></label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md form-floating mb-3">
                        <input type="date" name="gestion" class="form-control" id="floatingInput" placeholder="fecha">
                        <label for="floatingInput"><i>Gestion</i></label>
                    </div>
                    <div class="col-md form-floating mb-3">
                        <input type="text" name="monto" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput"><i>Monto</i></label>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md form-floating mb-3 ">
                        <!--<input class="form-check-input" name="estado" type="hidden" id="floatingInput" checked placeholder="name@example.com" value="BAJA"/>
                        <label class="form-check-label" for="floatingInput">Estado</label>
                        <input class="form-check-input" name="estado" type="checkbox" id="floatingInput" checked placeholder="name@example.com" value="ALTA"/>
                        <label class="form-check-label" for="floatingInput">Estado</label> -->

                        <select name="estado" class="form-select" aria-label="Default select example">
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
  <!-- Modal crear fin-->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('eliminar') == 'ok')
      <script>
        Swal.fire(
          'Eliminado!',
          'El Usuario se elimino con exito.',
          'success'
        )
      </script>
    @endif
    <script>
        $('.formulario-eliminar').submit(function(e){
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
        $(document).ready(function () {
          $('#recurso').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "ALL"]],
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
          });
        });
      </script>
@stop