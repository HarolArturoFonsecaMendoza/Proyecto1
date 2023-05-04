@extends('layout.vistapadre')
@section('contenidoPrincipal')
<h1 class="container">Detalles de la Tarea: {{$tarea->nombre}}
  <form action="{{route('tarea.borrar', ['id'=> $tarea->id])}}" method="POST" class="">
    @csrf
    @method('delete')
    <a href="{{route('tarea.edit', ['id' => $tarea->id])}}" class="btn btn-success btn-sm shadow-none" 
      data-toggle="tooltip" data-placement="top" title="Editar tarea">
      <i class="fa fa-pencil fa-fw text-white"></i>editar
    </a>
    <button id="delete" name="delete" type="submit" 
      class="btn btn-danger btn-sm shadow-none" 
      data-toggle="tooltip" data-placement="top" title="Eliminar tarea"
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
        <th scope="row">Id tarea</th>
        <td>{{$tarea->id}} </td>
      </tr>

      <tr>
        <th scope="row">Nombre de la tarea</th>
        <td>{{$tarea->nombre}} </td>
      </tr>

      <tr>
        <th scope="row">Descripcion del tarea</th>
        <td>{{$tarea->descripcion}} </td>
      </tr>

      <tr>
        <th scope="row">estado de la tarea</th>
        <td>{{$tarea->estado}} </td>
      </tr>

      <tr>
        <th scope="row">Fecha de inicio</th>
        <td>{{$tarea->fecha_inicio}} </td>
      </tr>

      <tr>
        <th scope="row">Fecha finalizacion</th>
        <td>{{$tarea->fecha_fin}} </td>
      </tr>

      <tr>
        <th scope="row">Id de usuario asignado</th>
        <td>{{$tarea->usuario_id}} </td>
      </tr>

      <tr>
        <th scope="row">Id de proyecto asignado</th>
        <td>{{$tarea->proyecto_id}} </td>
      </tr>
      
  </tbody>
</table>
<a class = "btn btn-primary" href= "{{route('tarea.index')}}">Regresar</a>
</div>
@endsection