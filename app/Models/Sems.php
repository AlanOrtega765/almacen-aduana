<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sems extends Model
{
    use HasFactory;
    protected $fillable = [

        'fecha_llegada',
        'fecha_venc',
        'tipo_cancelacion',
        'estado',
        'observacion',
        'total_general',
        'numero_lig_grav',
        'fecha_gcp',
        'id_user_fk',
        'id_persona_fk'
    ];
}
