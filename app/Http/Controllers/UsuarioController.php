<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    //el primer controlador para mostrar los datos de la tabla de usuario y busacr usuarios por nombres
    public function index(Request $request){
        $busqueda = $request->get('buscar');
        $usuarios = Usuario::where('nombre','like','%'.$busqueda.'%')->paginate(10);
        return view('RaizUsuario', compact('usuarios','busqueda'));
    }

    //Este controlador muestra los datos de cada usuario cuando entra a la vista de ver
    public function show($id){
        $usuario = Usuario::findOrFail($id);
        return view('UsuarioIndividual')->with('usuario',$usuario);
    }

    //controlador para el formulario de creacion de usuario
    public function create(){
        return view('formulariousuario');
    }

    //controlador para guardar los datos del formulario de creacion
    public function store(Request $request){
        $request->validate(['id'=>'required|numeric|unique:usuarios,id','nombre'=>'required|alpha',
        'correo'=>'required|unique:usuarios,correo_electronico']);

        $nuevoUsuario= new Usuario();
        $nuevoUsuario->id = $request->input('id');
        $nuevoUsuario->nombre = $request->input('nombre');
        $nuevoUsuario->correo_electronico = $request->input('correo');

        //para crear el usuario
        $creado = $nuevoUsuario->save();

        if($creado){
            return redirect()->route('usuario.index')->with('mensaje','El usuario fue creado con exito!');
        }
        else{
            //retornar un mensaj de error 
        }
    }

    //controlador para enviar al formulario de edicion o actualizacion de usuario
    public function edit($id){
        $usuario = Usuario::findOrFail($id);
        return view('formularioEditarUsuario')->with('usuario', $usuario);
    }

    //controlador para actualizar los usuarios
    public function update(Request $request, $id){
        //Validaciones
        $request->validate(['id'=>'required|numeric:usuarios,id','nombre'=>'required|alpha',
        'correo'=>'required']);

        $usuario = Usuario::findOrFail($id);
        $usuario->id = $request->input('id');
        $usuario->nombre = $request->input('nombre');
        $usuario->correo_electronico = $request->input('correo');

        //para crear el usuario
        $creado = $usuario->save();

        
        if($creado){
            return redirect()->route('usuario.index')->with('mensaje','El usuario fue modificado exitosamente!');
        }
        else{
            //retornar un mensaj de error 
        }
    }

    //controlador para eliminar un usuario
    public function destroy($id){
        Usuario::destroy($id);

        return redirect()->route('usuario.index')->with('mensaje','El usuario fue eliminado exitosamente');
    }

}
