@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registro de Recursos</h1>
@stop

@section('content')
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
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <label for="nombre">Nombre del Proyecto</label>
               <input type="text" name="nombre" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
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
        <div class="col-xs-12 col-sm-12 col-md-12">
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
        <div class="col-xs-12 col-sm-12 col-md-12">
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
        <div class="col-xs-12 col-sm-12 col-md-12">
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <label for="fecha_inicio">Fecha de Inicio</label>
               <input type="text" name="fecha_inicio" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <label for="fecha_final">Fecha de Final</label>
               <input type="text" name="fecha_final" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <label for="estado">Estado</label>
               <input type="text" name="estado" class="form-control">
            </div>
        </div> 
            <button type="submit" class="btn btn-primary">Guardar</button>                            
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop