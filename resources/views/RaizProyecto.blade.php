@extends('layout.vistapadre')
@section('contenidoPrincipal')
<!-- targeta -->
<h2 class="container">Contenido de la vista de la tabla de proyectos</h2>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- notificacion de que se creo exitosamente el estudiante-->
@if(session('mensaje'))
  <div class="alert alert-success">
    {{session('mensaje')}}
  </div>
@endif  
<div class="container">
  {{$proyectos->withQueryString()->links()}}
</div>

<div class="container-fluid">
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">Id proyecto</th>
      <th scope="col">Nombre del proyecto</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Fecha inicio</th>
      <th scope="col">Fecha fin</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    @forelse($proyectos as $proyecto)   
      <tr >
        <th scope="row">{{$proyecto->id}}</th>
        <td>{{$proyecto->nombre}}</td>
        <td width="500" rowspan="1">{{$proyecto->descripcion}}</td>
        <td>{{$proyecto->fecha_inicio}}</td>
        <td>{{$proyecto->fecha_fin}}</td>

        <td>
            <a href="{{route('proyecto.mostrar', ['id'=> $proyecto->id])}}"class="btn btn-primary btn-sm shadow-none"
            data-toggle="tooltip" data-placement="top" title="Ver proyecto">
            <i class="fa fa-book fa-fw text-white"></i></a>
        </td>
        <td>
            <a href="{{route('proyecto.edit', ['id' => $proyecto->id])}}" class="btn btn-success btn-sm shadow-none" 
            data-toggle="tooltip" data-placement="top" title="Editar proyecto">
            <i class="fa fa-pencil fa-fw text-white"></i></a>
        </td>
        <td>
            <form action="{{route('proyecto.borrar', ['id'=> $proyecto->id])}}" method="POST" class="">
              @csrf
              @method('delete')
                <button id="delete" name="delete" type="submit" 
                 class="btn btn-danger btn-sm shadow-none" 
                 data-toggle="tooltip" data-placement="top" title="Eliminar proyecto"
                 onclick="return confirm('¿Estás seguro de eliminar?')">
                    <i class="fa fa-trash-o fa-fw"></i>
                </button>
            </form>
        </td>
      </tr>

     @empty
        <tr>
          <td col-span = "4">No hay proyectos ingresados </td>
        </tr>
    @endforelse 
  </tbody>
</table>
</div>
@endsection