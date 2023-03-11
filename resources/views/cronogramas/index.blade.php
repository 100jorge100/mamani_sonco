@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">crongramas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <h3>Cronograma <span class="badge bg-secondary">{{$proyecto->nombre}}</span></h3>
            
                        @can('crear-blog')
                        <a class="btn btn-warning" href="{{ route('cronogramas.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#28B463">       
                                    <th style="color:#fff;">Actividad</th>    
                                    <th style="color:#fff;">Descripcion</th>   
                                    <th style="color:#fff;">Fecha Inicio</th>
                                    <th style="color:#fff;">Fecha Final</th> 
                                    <th style="color:#fff;">Estado</th>                                                            
                              </thead>
                              <tbody>
                            @foreach ($proyecto->cronogramas as $registro)
                            <tr>    
                                    <td>{{ $registro->nombre }}</td>
                                    <td>{{ $registro->descripcion }}</td>     
                                    <td>{{ $registro->fecha_inicio }}</td> 
                                    <td>{{ $registro->fecha_final }}</td> 
                                    <td>{{ $registro->estado }}</td> 
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop