<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesContrabandos extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_rol_fk',
        'id_mercancia_fk',
        'id_vehiculo_fk',
    ];
}