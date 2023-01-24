<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_person',
        'tipo_doc_p',
        'nro_id_person',
        'nombre_p',
        'apellido_p',
        'dirección_p',
        'nacionalidad_p',
        'reincidente'
    ];
}
