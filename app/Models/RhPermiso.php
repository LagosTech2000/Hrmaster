<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhPermiso extends Model

{

    protected $fillable = ['fk_id_tipo_permiso','fk_id_empleado'];
    
    use HasFactory;

    //funcion para las relaciones con las otras tablas
    public function permisos(){
        return $this->belongsTo(RhTipoPermiso::class, 'fk_id_tipo_permiso');
    }

    public function empleados(){
        return $this->belongsTo(Empleado::class, 'fk_id_empleado');
    }

  
    
}
