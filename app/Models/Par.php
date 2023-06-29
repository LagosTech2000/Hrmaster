<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Par extends Model
{
    use HasFactory;
    public function registro_clientes(){
        return $this->hasMany(Registro_cliente::class, 'id');
    }
}
