<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

//controlador para mostrar los datos de la tabla tareas
class TareaController extends Controller
{
    public function index(Request $request){
        $busqueda = $request->get('buscar');
        $tareas = Tarea::where('nombre','like','%'.$busqueda.'%')->paginate(5);
        return view('RaizTarea', compact('tareas','busqueda'));
    }

    //Este controlador muestra los datos de cada tarea cuando entra a la vista de ver
    public function show($id){
        $tarea = Tarea::findOrFail($id);
        return view('tareaindividual')->with('tarea',$tarea);
    }

    //controlador para el formulario de creacion de tarea
    public function create(){
        return view('formulariotarea');
    }

    //controlador para guardar los datos del formulario de creacion
    public function store(Request $request){
        $request->validate(['nombre'=>'required',
        'descripcion'=>'required','estado'=>'required','fechaInicio'=>'required', 'fechaFin'=>'required',
        'idUsuario'=>'required|numeric:tareas,usuario_id',
        'idProyecto'=>'required|numeric:tareas,proyecto_id']);
    
        $nuevaTarea= new Tarea();
        $nuevaTarea->nombre = $request->input('nombre');
        $nuevaTarea->descripcion = $request->input('descripcion');
        $nuevaTarea->estado = $request->input('estado');
        $nuevaTarea->fecha_inicio = $request->input('fechaInicio');
        $nuevaTarea->fecha_fin = $request->input('fechaFin');
        $nuevaTarea->usuario_id = $request->input('idUsuario');
        $nuevaTarea->proyecto_id = $request->input('idProyecto');
        


        //para crear la tarea
        $creado = $nuevaTarea->save();
    
        if($creado){
            return redirect()->route('tarea.index')->with('mensaje','La tarea fue creada con exito!');
        }
        else{
            //retornar un mensaj de error 
        }    
    }

    //controlador para enviar al formulario de edicion o actualizacion de la tarea
    public function edit($id){
        $tarea = Tarea::findOrFail($id);
        return view('formularioEditartarea')->with('tarea', $tarea);
    }

    //controlador para actualizar las tareas
    public function update(Request $request, $id){
        //Validaciones
        $request->validate(['nombre'=>'required',
        'descripcion'=>'required','estado'=>'required','fechaInicio'=>'required', 'fechaFin'=>'required',
        'idUsuario'=>'required|numeric:tareas,usuario_id',
        'idProyecto'=>'required|numeric:tareas,proyecto_id']);

        $tarea = tarea::findOrFail($id);

        $tarea->nombre = $request->input('nombre');
        $tarea->descripcion = $request->input('descripcion');
        $tarea->estado = $request->input('estado');
        $tarea->fecha_inicio = $request->input('fechaInicio');
        $tarea->fecha_fin = $request->input('fechaFin');
        $tarea->usuario_id = $request->input('idUsuario');
        $tarea->proyecto_id = $request->input('idProyecto');

        //para crear el proyecto
        $creado = $tarea->save();
        
        if($creado){
            return redirect()->route('tarea.index')->with('mensaje','La tarea fue modificada exitosamente!');
        }
        else{
            //retornar un mensaje de error 
        }
    }

    //controlador para eliminar un uproyecto
    public function destroy($id){
        Tarea::destroy($id);
        return redirect()->route('tarea.index')->with('mensaje','La tarea fue eliminada exitosamente');
    }
    
}
