@extends('layout.vistapadre')
@section('contenidoPrincipal')
<h1 class="container">Ingresar nuevo Usuario</h1>
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
        <label for="id">Id del(a) Usuario(a)</label>
        <input type="number" class="form-control" name = "id"id="id" 
        placeholder="escriba el Id">
    </div><br>
    <div class="form-group">
        <label for="nombre">Nombre del(a) Usuario(a)</label>
        <input type="text" class="form-control" name = "nombre"id="nombre" 
        placeholder="escriba el nombre">
    </div><br>

    <div class="form-group">
        <label for="correo">Correo electronico del(a) usuario(a)</label>
        <input type="email" class="form-control" name = "correo"id="correo" 
        placeholder="escriba el correo">
    </div><br>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <input type="reset" class="btn btn-danger">
</form><br>
<a class = "btn btn-primary" href= "{{route('usuario.index')}}">Regresar</a>
</div>
@endsection