<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroCliente extends Model
{
    public function armarios(){
        return $this->belongsTo(Armario::class, 'fk_id_armario');
    }

    public function caja_terminals(){
        return $this->belongsTo(Caja_terminal::class, 'fk_id_caja_terminal');
    }
}
