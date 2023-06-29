<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//aqui agregue el model de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //aqui solo es para rellenar las tablas de Spatie con los permisos que yo puedo editar
        $permisos = [
            //permisos de administrador
            'admin-ver',
            'admin-crear',
            'admin-editar',
            'admin-borrar',
           //permisos de administrador
            'recursos-humanos-ver',
            'recursos-humanos-crear',
            'recursos-humanos-editar',
            'recursos-humanos-borrar',
            //atencion al cliente
           
        ];
        foreach($permisos as $permiso){
         Permission::create(['name'=>$permiso]);   
        }

    }
}
