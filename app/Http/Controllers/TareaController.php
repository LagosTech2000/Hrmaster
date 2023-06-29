<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//aqui debo referenciar el modelo de este modulo:
use App\Models\Tarea;

class TareaController extends Controller
{

    function __construct()
     {
         $this->middleware('permission:ver-tarea|crear-tarea|editar-tarea|borrar-tarea',['only'=>['index']]);
         $this->middleware('permission:crear-tarea',['only'=>['create','store']]);
         $this->middleware('permission:editar-tarea',['only'=>['edit','update']]);
         $this->middleware('permission:borrar-tarea',['only'=>['destroy']]);

     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tareas = Tarea::paginate(5);
        return view('tareas.index', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tareas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        Tarea::create($request->all());
        return redirect()->route('tareas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        //en esta funcion edit si cambie los valores del parentesis para obtener el id correcto.
           return view('tareas.editar', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        //tambien edite el parentesis para obtener el id correcto peor deje el request tambien.
        $request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        $tarea->update($request->all());
        return redirect()->route('tareas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        //tanbien debo obtener el id correcto por eso edite el parentesis
        $tarea->delete();
        return redirect()->route('blogs.index');
    }
}
