<?php

namespace App\Models\vehiculos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculos extends Model
{

    use HasFactory;
    protected $fillable=[
'numeropersonal', 'nombredeempleado'
    ];


}

