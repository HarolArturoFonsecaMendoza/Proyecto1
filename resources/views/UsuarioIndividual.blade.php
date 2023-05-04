@extends('layout.vistapadre')
@section('contenidoPrincipal')
<h1 class="container">Detalles del Usuario: {{$usuario->nombre}}
  <form action="{{route('usuario.borrar', ['id'=> $usuario->id])}}" method="POST" class="">
    @csrf
    @method('delete')
    <a href="{{route('usuario.edit', ['id' => $usuario->id])}}" class="btn btn-success btn-sm shadow-none" 
      data-toggle="tooltip" data-placement="top" title="Editar usuario">
      <i class="fa fa-pencil fa-fw text-white"></i>editar
    </a>
    <button id="delete" name="delete" type="submit" 
      class="btn btn-danger btn-sm shadow-none" 
      data-toggle="tooltip" data-placement="top" title="Eliminar usuario"
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
        <td>{{$usuario->id}} </td>
      </tr>

      <tr>
        <th scope="row">Nombre</th>
        <td>{{$usuario->nombre}} </td>
      </tr>

      <tr>
        <th scope="row">Correo Electronico</th>
        <td>{{$usuario->correo_electronico}} </td>
      </tr>

  </tbody>
</table>
<a class = "btn btn-primary" href= "{{route('usuario.index')}}">Regresar</a>
</div>
@endsection