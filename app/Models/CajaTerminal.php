<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajaTerminal extends Model
{
    use HasFactory;
    public function registro_clientes(){
        return $this->hasMany(Registro_cliente::class, 'id');
    }
    
    public function armarios(){
        return $this->belongsTo(Armario::class, 'fk_id_armario');
    }
}
