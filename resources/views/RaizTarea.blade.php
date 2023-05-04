@extends('layout.vistapadre')
@section('contenidoPrincipal')
<!-- targeta -->
<h2 class="container">Contenido de la vista de la tabla de Tareas</h2>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- notificacion de que se creo exitosamente el estudiante-->
@if(session('mensaje'))
  <div class="alert alert-success">
    {{session('mensaje')}}
  </div>
@endif  
<div class="container">
  {{$tareas->withQueryString()->links()}}
</div>

<div class="container-fluid">
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">Id tarea</th>
      <th scope="col">Nombre de la tarea</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Estado</th>
      <th scope="col">Fecha inicio</th>
      <th scope="col">Fecha fin</th>
      <th scope="col">Id Usuario</th>
      <th scope="col">Id Proyecto</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    @forelse($tareas as $tarea)   
      <tr >
        <th scope="row">{{$tarea->id}}</th>
        <td>{{$tarea->nombre}}</td>
        <td width="300" rowspan="1">{{$tarea->descripcion}}</td>
        <td>{{$tarea->estado}}</td>
        <td>{{$tarea->fecha_inicio}}</td>
        <td>{{$tarea->fecha_fin}}</td>
        <td>{{$tarea->usuario_id}}</td>
        <td>{{$tarea->proyecto_id}}</td>

        <td>
            <a href="{{route('tarea.mostrar', ['id'=> $tarea->id])}}"class="btn btn-primary btn-sm shadow-none"
            data-toggle="tooltip" data-placement="top" title="Ver tarea">
            <i class="fa fa-book fa-fw text-white"></i></a>
        </td>
        <td>
            <a href="{{route('tarea.edit', ['id' => $tarea->id])}}" class="btn btn-success btn-sm shadow-none" 
            data-toggle="tooltip" data-placement="top" title="Editar tarea">
            <i class="fa fa-pencil fa-fw text-white"></i></a>
        </td>
        <td>
            <form action="{{route('tarea.borrar', ['id'=> $tarea->id])}}" method="POST" class="">
              @csrf
              @method('delete')
                <button id="delete" name="delete" type="submit" 
                 class="btn btn-danger btn-sm shadow-none" 
                 data-toggle="tooltip" data-placement="top" title="Eliminar tarea"
                 onclick="return confirm('¿Estás seguro de eliminar?')">
                    <i class="fa fa-trash-o fa-fw"></i>
                </button>
            </form>
        </td>
      </tr>

     @empty
        <tr>
          <td col-span = "4">No hay tareas ingresadas </td>
        </tr>
    @endforelse 
  </tbody>
</table>
</div>
@endsection