<?php

namespace Database\Seeders;
use App\Models\Empleado;

use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $empleado = new Empleado();
$empleado->id = '0408';
$empleado->nombreEmpleado = 'Yeison Anderson Figueroa';
$empleado->telefonoEmpleado = '+725357789';
$empleado->numIdentidadEmpleado = '0801199202897';
$empleado->areaTrabajo = 'administrativa';
$empleado->save();

$empleado1 = new Empleado();
$empleado1->id = '5555';
$empleado1->nombreEmpleado = 'Mairon Fabricio Godoy';
$empleado1->telefonoEmpleado = '+7254545';
$empleado1->numIdentidadEmpleado = '08034333202897';
$empleado1->areaTrabajo = 'ventas';
$empleado1->save();

    }
}
