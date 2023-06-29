<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrowifi extends Model
{
    use HasFactory;
    public function registrolineas(){
        return $this->belongsTo(Registrolinea::class, 'fk_id_linea');
    }
}
