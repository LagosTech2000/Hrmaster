<?php

namespace App\Http\Controllers\rhumanos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Session;
//agregare para el control de usuarios con Spatie:
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EmpleadoController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:recursos-humanos-ver|recursos-humanos-editar|recursos-humanos-borrar',['only'=>['index']]);
        $this->middleware('permission:recursos-humanos-crear',['only'=>['create','store']]);
        $this->middleware('permission:recursos-humanos-editar',['only'=>['edit','update']]);
        $this->middleware('permission:recursos-humanos-borrar',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if(request()->ajax())
        {
       if(!empty($request->from_date))
        {
         $data = Empleado::select('empleados.*')->orderBy('id','DESC')
           ->whereBetween('fechaSolicitudPermiso', array($request->from_date, $request->to_date));
         }
        else
        {
           $data = Empleado::select('empleados.*')->orderBy('id','DESC');
           
        }
          return datatables()->of($data)
          
          ->addColumn('action', function ($data) {
         

           return view('/empleados.action', compact('data'));
           

       })
          
           ->rawColumns(['action'])
          ->make(true);
       }

         return view('/empleados.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/empleados.crear');
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
        $validated = $request->validate([
            
            'nombreEmpleado' => 'required',
            'telefonoEmpleado' => 'required',
            'numIdentidadEmpleado' => 'required',
            'areaTrabajo' => 'required',
            
            
        ]);

        $empleado = new Empleado;
     
       
       $empleado->nombreEmpleado =  $request->nombreEmpleado;
       $empleado->telefonoEmpleado = $request->telefonoEmpleado;
       $empleado->numIdentidadEmpleado = $request->numIdentidadEmpleado;
       $empleado->areaTrabajo = $request->areaTrabajo;
    //    $empleado->totalDiasIncapacidad = $request->totalDiasIncapacidad;
    //    $empleado->ihss = $request->ihss;
    //    $empleado->lugarSolicitudempleado = 'Juticalpa';
    //    $empleado->nombreQuienCreo =  (\Illuminate\Support\Facades\Auth::user()->name);
    //    $empleado->fechaSolicitudempleado = $request->fechaSolicitudempleado;
       $empleado->save();
       Session::flash('notiGuardado', 'El empleado ha sido Guardado');
       return redirect()->route('empleados.index');

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
     * @param  int  $id     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        return view('/empleados.editar', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            
        ]);

        $empleado = request()->except(['_token', '_method']);
        Empleado::where('id','=', $id)->update($empleado);
        Session::flash('notiEditado', 'El empleado ha sido editado');
        return redirect()->route('empleados.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::find($id)->delete();
        Session::flash('notiBorrado', 'El empleado ha sido borrado');
        return redirect()->route('empleados.index');
    }
}
