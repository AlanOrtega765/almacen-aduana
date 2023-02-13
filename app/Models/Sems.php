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
        'aduana_presenta',
        'entrega_maxima',
        'tipo_cancelacion',
        'estado',
        'observacion',
        'total_general',
        'numero_lig_grav',
        'drs_tipo',
        'drs_numero',
        'drs_fecha',
        'drs_fecha_venc',

        'fecha_gcp',
        'id_user_fk',
        'id_persona_fk'
    ];
}
