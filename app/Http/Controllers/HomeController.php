<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RhPermiso;
use App\Models\Empleado;
use App\Models\RegistroAveria;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {   $paseSalida= RhPermiso::where('aprobacion', 'like', 'pendiente')->count();
        $contadoraveria= RegistroAveria::where('estadoAveria', 'like', 'pendiente')->count();
          return view('home', compact('paseSalida', 'contadoraveria'));
    }
}
