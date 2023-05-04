@extends('layout.vistapadre')
@section('contenidoPrincipal')
<!-- targeta -->
<h2 class="container">Contenido de la vista de la tabla de usuarios</h2>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- notificacion de que se creo exitosamente el estudiante-->
@if(session('mensaje'))
  <div class="alert alert-success">
    {{session('mensaje')}}
  </div>
@endif  
<div class="container">
  {{$usuarios->withQueryString()->links()}}
</div>

<div class="container">
<table class="table">
  <thead class="table-dark">
    <tr>
      <th >Id usuario</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo Electronico</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
    @forelse($usuarios as $usuario)   
      <tr>
        <td>{{$usuario->id}}</td>
        <td>{{$usuario->nombre}}</td>
        <td>{{$usuario->correo_electronico}}</td>
        <td>
            <a href="{{route('usuario.mostrar', ['id'=> $usuario->id])}}"class="btn btn-primary btn-sm shadow-none"
            data-toggle="tooltip" data-placement="top" title="Ver usuario">
            <i class="fa fa-book fa-fw text-white"></i>ver</a>
        </td>
        <td>
            <a href="{{route('usuario.edit', ['id' => $usuario->id])}}" class="btn btn-success btn-sm shadow-none" 
            data-toggle="tooltip" data-placement="top" title="Editar usuario">
            <i class="fa fa-pencil fa-fw text-white"></i></a>
        </td>
        <td>
            <form action="{{route('usuario.borrar', ['id'=> $usuario->id])}}" method="POST" class="">
              @csrf
              @method('delete')
                <button id="delete" name="delete" type="submit" 
                 class="btn btn-danger btn-sm shadow-none" 
                 data-toggle="tooltip" data-placement="top" title="Eliminar usuario"
                 onclick="return confirm('¿Estás seguro de eliminar?')">
                    <i class="fa fa-trash-o fa-fw"></i>
                </button>
            </form>
        </td>
      </tr>

     @empty
        <tr>
          <td col-span = "4">No hay usuarios ingresados </td>
        </tr>
    @endforelse 
  </tbody>
</table>
</div>
@endsection