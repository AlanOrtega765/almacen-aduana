<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrabandos extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_contrab',
        'fecha_venc_contrab',
        'estado',
        'tipo_contrabando',
        'nue',
        'doc_denunciante',
        'doc_cancelacion',
        'fecha_canc',
        'doc_de_entrega',
        'fecha_doc_entrega',
        'observaciones',
        'id_user_fk',
        'id_persona_fk'
    ];

}
