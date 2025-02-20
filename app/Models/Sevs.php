<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sevs extends Model
{
    use HasFactory;
    protected $fillable = [

        'fecha_llegada',
        'fecha_venc',
        'estado',
        'observacion',
        'id_user_fk',
        'id_persona_fk'
    ];
}
