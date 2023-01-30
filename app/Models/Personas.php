<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;
    protected $fillable = [

        'tipo_doc_p',
        'nro_id_person',
        'nombre_p',
        'apellido_p',
        'direccion_p',
        'nacionalidad_p',
        'reincidente'
    ];
}
