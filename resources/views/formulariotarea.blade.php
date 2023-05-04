@extends('layout.vistapadre')
@section('contenidoPrincipal')
<h1 class="container">Ingresar una nueva tarea</h1>
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
<form method ="post" action="">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre de la tarea</label>
        <input type="text" class="form-control" name = "nombre"id="nombre" 
        placeholder="escriba el nombre de la tarea">
    </div><br>

    <div class="form-group">
        <label for="descripcion">Descripcion de la tarea</label>
        <input type="text" class="form-control" name = "descripcion"id="descripcion" 
        placeholder="escriba la descripcion">
    </div><br>

    <div class="form-group">
        <label for="estado">Estado de la tarea</label>
        <input type="text" class="form-control" name = "estado"id="estado" 
        placeholder="Listo - Pendiente - En proceso - casi terminado - terminado">
    </div><br>

    <div class="form-group">
        <label for="fechaInicio">fecha de inicio</label>
        <input type="date" class="form-control" name = "fechaInicio"id="fechaInicio" 
        placeholder="2023-06-06">
    </div><br>

    <div class="form-group">
        <label for="fechaFin">fecha fin</label>
        <input type="date" class="form-control" name = "fechaFin"id="fechaFin" 
        placeholder="2023-07-06">
    </div><br>

    <div class="form-group">
        <label for="idUsuario">Id de Usuario</label>
        <input type="" class="form-control" name = "idUsuario"id="idUsuario" 
        placeholder="##">
    </div><br>

    <div class="form-group">
        <label for="idUsuario">Id de proyecto</label>
        <input type="text" class="form-control" name = "idProyecto"id="idProyecto" 
        placeholder="##">
    </div><br>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <input type="reset" class="btn btn-danger">
</form><br>
<a class = "btn btn-primary" href= "{{route('proyecto.index')}}">Regresar</a>
</div>
@endsection