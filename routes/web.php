<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Grupo de rutas para usuarios:
//mostar los datos en la visa RaizUsuario
route::get('/usuarios','App\Http\Controllers\UsuarioController@index')->name('usuario.index');
//ruta para mostrar un usuario
route::get('/usuarios/{id}', 'App\Http\Controllers\UsuarioController@show')->name('usuario.mostrar')
->where('id', '[0-9]+');
//ruta para enviar al usuario a un formulario y poder crear un nuevo usuario
route::get('usuarios/crear','App\Http\Controllers\UsuarioController@create')->name('usuario.crear');
//ruta para recibir los datos del formulario y guardarlos en la bas de datos
route::post('usuarios/crear','App\Http\Controllers\UsuarioController@store')->name('usuario.guardar');
//ruta para editar los usuarios
route::get('usuarios/{id}/editar','App\Http\Controllers\UsuarioController@edit')->name('usuario.edit')
->where('id','[0-9]+');
//ruta para guardar los datos actualizados de los estudiantes
route::put('usuarios/{id}/editar','App\Http\Controllers\UsuarioController@update')->name('usuario.update')
->where('id','[0-9]+');
//ruta para eliminar un usuario
route::delete('usuarios/{id}/borrar','App\Http\Controllers\UsuarioController@destroy')->name('usuario.borrar')
->where('id','[0-9]+');

//GRUPO DE RUTAS PARA LA TABLA PROYECTOS
route::get('/proyectos','App\Http\Controllers\ProyectoController@index')->name('proyecto.index');
//ruta para mostrar un proyecto
route::get('/proyectos/{id}', 'App\Http\Controllers\ProyectoController@show')->name('proyecto.mostrar')
->where('id', '[0-9]+');
//ruta para enviar al proyecto a un formulario y poder crear un nuevo proyecto
route::get('proyectos/crear','App\Http\Controllers\ProyectoController@create')->name('proyecto.crear');
//ruta para recibir los datos del formulario y guardarlos en la bas de datos
route::post('proyectos/crear','App\Http\Controllers\ProyectoController@store')->name('proyecto.guardar');
//ruta para editar los proyectos
route::get('proyectos/{id}/editar','App\Http\Controllers\ProyectoController@edit')->name('proyecto.edit')
->where('id','[0-9]+');
//ruta para guardar los datos actualizados de los proyectos
route::put('proyectos/{id}/editar','App\Http\Controllers\ProyectoController@update')->name('proyecto.update')
->where('id','[0-9]+');
//ruta para eliminar un proyecto
route::delete('proyectos/{id}/borrar','App\Http\Controllers\ProyectoController@destroy')->name('proyecto.borrar')
->where('id','[0-9]+');

//GRUPO DE RUTAS PARA LA TABLA TAREAS
route::get('/tareas','App\Http\Controllers\TareaController@index')->name('tarea.index');
//ruta para mostrar un tarea
route::get('/tareas/{id}', 'App\Http\Controllers\TareaController@show')->name('tarea.mostrar')
->where('id', '[0-9]+');
//ruta para enviar al tarea a un formulario y poder crear un nuevo tarea
route::get('tareas/crear','App\Http\Controllers\TareaController@create')->name('tarea.crear');
//ruta para recibir los datos del formulario y guardarlos en la bas de datos
route::post('tareas/crear','App\Http\Controllers\TareaController@store')->name('tarea.guardar');
//ruta para editar los tareas
route::get('tareas/{id}/editar','App\Http\Controllers\TareaController@edit')->name('tarea.edit')
->where('id','[0-9]+');
//ruta para guardar los datos actualizados de los tareas
route::put('tareas/{id}/editar','App\Http\Controllers\TareaController@update')->name('tarea.update')
->where('id','[0-9]+');
//ruta para eliminar un tarea
route::delete('tareas/{id}/borrar','App\Http\Controllers\TareaController@destroy')->name('tarea.borrar')
->where('id','[0-9]+');


