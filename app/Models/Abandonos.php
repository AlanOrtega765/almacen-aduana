<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abandonos extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_oficio',
        'fecha_venc',
        'fecha_recepcion',
        'observacion',
        'estado',
        'id_users_fk',
    ];
}

