<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armario extends Model
{
    use HasFactory;
    public function registro_clientes(){
        return $this->hasMany(Registro_cliente::class, 'id');
    }

    public function caja_terminals(){
        return $this->hasMany(Caja_terminal::class, 'id');
    }
}
