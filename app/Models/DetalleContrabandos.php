<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleContrabandos extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_rol_contrab',

        'n_rol_merc',
        'id_vehiculo_fk',
    ];
}
