@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Gestion De Proyectos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-blog')
                       <!-- <a class="btn btn-dark" href="{{ route('proyectos.create') }}" ><i class="fa fa-plus" aria-hidden="true">    Agregar Nuevo Proyecto</i></a> -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCrear">
                            Launch static backdrop modal
                        </button>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#e03737f6">        
                                    <th style="display: none;">#</th>                             
                                    <th style="color:#fff;">Nombre</th>
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
                                    @foreach ($proyectos as $proyecto)
                                    <tr>
                                        <td style="display: none;">{{ $proyecto->id }}</td>                                
                                        <td>{{ $proyecto->nombre }}</td>
                                        <td>{{ $proyecto->comunidads->nombre }}</td>
                                        <td>{{ $proyecto->recursos->nombre }}</td>
                                        <td>{{ $proyecto->empresas->nombre }}</td>
                                        <td>{{ $proyecto->categorias->nombre }}</td>
                                        <td>{{ $proyecto->fecha_inicio }}</td>
                                        <td>{{ $proyecto->fecha_final }}</td>
                                        <td>{{ $proyecto->estado }}</td>
                                        <td>
                                            <form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST">                                        
                                                @can('editar-proyecto')
                                                    <a class="btn btn-info" href="{{ route('proyectos.edit',$proyecto->id) }}">
                                                        <i class="fas fa-solid fa-pen">Editar</i>
                                                    </a>
                                                @endcan
        
                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-proyecto')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-solid fa-trash">Borrar</i>
                                                </button>
                                                @endcan
                                                <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-secondary"><i class="fas fa-solid fa-chart-line"></i></a>
                                                <a href="#" class="btn btn-dark"><i class="fas fa-regular fa-file-pdf"></i></a>
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
<div class="modal fade" id="ModalCrear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                    <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}</option>
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
                        <input type="text" name="estado" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>                            
            </div>
        </form>
        </div>
      </div>
    </div>
</div>
<!--crear final-->
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
@stop