<?php

namespace Database\Seeders;

use App\Models\Municipios;
use Illuminate\Database\Seeder;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            array('Nombre'=>  'JUTICALPA', 'Total'=> 20),
            array('Nombre'=>  'PATUCA', 'Total'=> 20),
            array('Nombre'=>  'SAN FRANCISCO DE LA PAZ', 'Total'=> 20),
            array('Nombre'=>  'CAMPAMENTO', 'Total'=> 20),
            array('Nombre'=>  'SAN ESTEBAN', 'Total'=> 20),

        ];
        Municipios::insert($data);
    }
}
