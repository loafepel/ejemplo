<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareasController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3'
        ]);


    $tarea = new Tarea;
    $tarea->title=$request->title;
    $tarea->save();
    return redirect()->route('prueba')->with('success', 'Tarea creada correctamente');
    }

    public function index()
    {
        $tareas = Tarea::all();
    return view('Tareas.index', ['prueba'=>$tareas]);
    }

    public function show($id)
    {
        $tarea = Tarea::find($id);
    return view('Tareas.show', ['prueba'=>$tarea]);
    }
    public function update(Request $request, $id)
    {
        $tarea=Tarea::find($id);
        $tarea->title = $request->title;
        $tarea->save();
        return redirect()->route('prueba')->with('success', 'Tarea actualizada');
    }
    public function destroy($id)
    {
       $tarea=Tarea::find($id);
       $tarea->delete();
       return redirect()->route('prueba')->with('Success', 'Tarea Borrada');
    }
}

