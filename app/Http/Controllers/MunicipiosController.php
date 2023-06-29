<?php

namespace App\Http\Controllers;

use App\Models\Municipios;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    public function index()
    {
        $municipios =Municipios::all();
$puntos= [];
foreach ($municipios as $municipio){
    $puntos[]= ['name' =>$municipio ['Nombre'], 'y' => floatval($municipio['Total'])];

}
return view("dasharchivos.dash.index", ["data" => json_encode($puntos)]);
    }
}
