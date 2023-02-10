<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezagos extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_reten',
        'fecha_venc',
        'franquicia',
        'estado',
        'observaciones',
        'id_user_fk',
        'id_persona_fk'
    ];

}
