<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    //controlador para mostrar los datos de la tabla proyectos
    public function index(Request $request){
        $busqueda = $request->get('buscar');
        $proyectos = Proyecto::where('nombre','like','%'.$busqueda.'%')->paginate(5);
        return view('RaizProyecto', compact('proyectos','busqueda'));
    }

    //Este controlador muestra los datos de cada proyecto cuando entra a la vista de ver
    public function show($id){
        $proyecto = Proyecto::findOrFail($id);
        return view('ProyectoIndividual')->with('proyecto',$proyecto);
    }

    //controlador para el formulario de creacion de proyecto
    public function create(){
        return view('formularioproyecto');
    }

    //controlador para guardar los datos del formulario de creacion
     public function store(Request $request){
        $request->validate(['id'=>'required|numeric|unique:proyectos,id','nombre'=>'required',
        'descripcion'=>'required','fechaInicio'=>'required']);
    
        $nuevoProyecto= new Proyecto();
        $nuevoProyecto->id = $request->input('id');
        $nuevoProyecto->nombre = $request->input('nombre');
        $nuevoProyecto->descripcion = $request->input('descripcion');
        $nuevoProyecto->fecha_inicio = $request->input('fechaInicio');
        $nuevoProyecto->fecha_fin = $request->input('fechaFin');

        //para crear el proyecto
        $creado = $nuevoProyecto->save();
    
        if($creado){
            return redirect()->route('proyecto.index')->with('mensaje','El proyecto fue creado con exito!');
        }
        else{
            //retornar un mensaj de error 
        }    
    }

    //controlador para enviar al formulario de edicion o actualizacion de proyecto
    public function edit($id){
        $proyecto = proyecto::findOrFail($id);
        return view('formularioEditarproyecto')->with('proyecto', $proyecto);
    }

    //controlador para actualizar los proyectos
    public function update(Request $request, $id){
        //Validaciones
        $request->validate(['id'=>'required|numeric:proyectos,id','nombre'=>'required|alpha',
        'descripcion'=>'required','fechaInicio'=>'required', 'fechaFin'=>'required']);

        $proyecto = proyecto::findOrFail($id);

        $proyecto->id = $request->input('id');
        $proyecto->nombre = $request->input('nombre');
        $proyecto->descripcion = $request->input('descripcion');
        $proyecto->fecha_inicio = $request->input('fechaInicio');
        $proyecto->fecha_fin = $request->input('fechaFin');

        //para crear el proyecto
        $creado = $proyecto->save();
        
        if($creado){
            return redirect()->route('proyecto.index')->with('mensaje','El proyecto fue modificado exitosamente!');
        }
        else{
            //retornar un mensaje de error 
        }
    }

    //controlador para eliminar un uproyecto
    public function destroy($id){
        Proyecto::destroy($id);

        return redirect()->route('proyecto.index')->with('mensaje','El Proyecto fue eliminado exitosamente');
    }

}
