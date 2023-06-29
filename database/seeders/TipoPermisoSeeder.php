<?php

namespace Database\Seeders;
use App\Models\RhTipoPermiso;

use Illuminate\Database\Seeder;

class TipoPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $TipoPermiso = new RhTipoPermiso();
        $TipoPermiso->id = '1';
        $TipoPermiso->tipoPermiso = 'pase de salida';
        $TipoPermiso->save();
        
        $TipoPermiso1 = new RhTipoPermiso();
        $TipoPermiso1->id = '2';
        $TipoPermiso1->tipoPermiso = 'permiso personal';
        $TipoPermiso1->save();

        $TipoPermiso2 = new RhTipoPermiso();
        $TipoPermiso2->id = '3';
        $TipoPermiso2->tipoPermiso = 'permiso administrativo';
        $TipoPermiso2->save();

        $TipoPermiso3 = new RhTipoPermiso();
        $TipoPermiso3->id = '4';
        $TipoPermiso3->tipoPermiso = 'permiso de ventas';
        $TipoPermiso3->save();

        $TipoPermiso3 = new RhTipoPermiso();
        $TipoPermiso3->id = '5';
        $TipoPermiso3->tipoPermiso = 'permiso de incapacidad';
        $TipoPermiso3->save();

        $TipoPermiso3 = new RhTipoPermiso();
        $TipoPermiso3->id = '6';
        $TipoPermiso3->tipoPermiso = 'pago de subsidio';
        $TipoPermiso3->save();
    }
}
