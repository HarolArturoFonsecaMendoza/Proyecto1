@extends('layout.vistapadre')
@section('contenidoPrincipal')
<h1 class="container">Editar Proyecto</h1>
<!-- mostrar los errores en el formulario-->
<div class="container">
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach    
        </ul>
    </div>
@endif 
</div>   
<div class="container">
<form method ="post" action="{{route('proyecto.update', ['id' => $proyecto->id])}}">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="nombre">Id del proyecto</label>
        <input type="text" class="form-control" name = "id"id="id" 
        placeholder="escriba el Id del proyecto" value="{{$proyecto->id}}">
    </div><br>
    <div class="form-group">
        <label for="nombre">Nombre del proyecto</label>
        <input type="text" class="form-control" name = "nombre"id="nombre" 
        placeholder="escriba el nombre del proyecto" value="{{$proyecto->nombre}}">
    </div><br>

    <div class="form-group">
        <label for="descripcion">Descripcion del proyecto</label>
        <input type="text" class="form-control" name = "descripcion"id="descripcion" 
        placeholder="escriba la descripcion" value="{{$proyecto->descripcion}}">
    </div><br>

    <div class="form-group">
        <label for="descripcion">fecha de inicio</label>
        <input type="date" class="form-control" name = "fechaInicio"id="fechaInicio" 
        placeholder="2023-06-06" value="{{$proyecto->fecha_inicio}}">
    </div><br>

    <div class="form-group">
        <label for="descripcion">fecha fin</label>
        <input type="date" class="form-control" name = "fechaFin"id="fechaFin" 
        placeholder="2023-07-06" value="{{$proyecto->fecha_fin}}">
    </div><br>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <input type="reset" class="btn btn-danger">
</form><br>
<a class = "btn btn-primary" href= "{{route('proyecto.index')}}">Regresar</a>
</div>
@endsection