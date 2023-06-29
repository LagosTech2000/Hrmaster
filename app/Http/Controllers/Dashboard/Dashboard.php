<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
  
  public function index(){

    $evaluaciones= DB::table('evaluaciones')
    ->join('empleados','empleados.id','evaluaciones.idEmpleado')
    ->get();

    $totalEvaluaciones=DB::table('evaluaciones')
    ->count();

    $totalUsuarios=DB::table('users')
    ->count();

    $maxIndividualValue = 68; // Maximum individual value
    $data1 = $evaluaciones->groupBy('areaTrabajo')->map(function ($group) use ($maxIndividualValue) {
        $total = $group->sum('valoracion');
        return round(($total / ($group->count() * $maxIndividualValue)) * 100, 2);
    });
    
    $data2 = $evaluaciones->groupBy('nombreEmpleado')->map(function ($group) {
        return $group->sum('valoracion');
    });

     
    return View('/Dashboard/dashboard')->with([
      'totalUsuarios'=>$totalUsuarios,
      'totalEvaluaciones'=>$totalEvaluaciones,
      'data1'=>$data1,
      'data2'=>$data2,
    ]);
    }
}
