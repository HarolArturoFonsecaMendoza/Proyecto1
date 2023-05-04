@extends('layout.vistapadre')
@section('contenidoPrincipal')
<h1 class="container">Detalles del Proyecto: {{$proyecto->nombre}}
  <form action="{{route('proyecto.borrar', ['id'=> $proyecto->id])}}" method="POST" class="">
    @csrf
    @method('delete')
    <a href="{{route('proyecto.edit', ['id' => $proyecto->id])}}" class="btn btn-success btn-sm shadow-none" 
      data-toggle="tooltip" data-placement="top" title="Editar proyecto">
      <i class="fa fa-pencil fa-fw text-white"></i>editar
    </a>
    <button id="delete" name="delete" type="submit" 
      class="btn btn-danger btn-sm shadow-none" 
      data-toggle="tooltip" data-placement="top" title="Eliminar proyecto"
      onclick="return confirm('¿Estás seguro de eliminar?')">
      <i class="fa fa-trash-o fa-fw"></i>Eliminar
    </button>
  </form>
</h1>
<div class="container">
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">Atributos</th>
      <th scope="col">Valores de los atributos</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <th scope="row">Id</th>
        <td>{{$proyecto->id}} </td>
      </tr>

      <tr>
        <th scope="row">Nombre</th>
        <td>{{$proyecto->nombre}} </td>
      </tr>

      <tr>
        <th scope="row">Descripcion del proyecto</th>
        <td>{{$proyecto->descripcion}} </td>
      </tr>

      <tr>
        <th scope="row">Fecha de inicio</th>
        <td>{{$proyecto->fecha_inicio}} </td>
      </tr>

      <tr>
        <th scope="row">Fecha finalizacion</th>
        <td>{{$proyecto->fecha_fin}} </td>
      </tr>
  </tbody>
</table>
<a class = "btn btn-primary" href= "{{route('proyecto.index')}}">Regresar</a>
</div>
@endsection