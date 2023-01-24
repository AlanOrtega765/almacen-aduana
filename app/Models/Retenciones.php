<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retenciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_boleta',
        'fecha_boleta',
        'n_doc_imputado',
        'nombre_imputado',
        'nacionalidad',
        'direccion',
        'ciudad',
        'franquicia',
        'descripcion',
        'bultos',
        'peso',
        'avanzada',
        'almacen',
        'observaciones',
        'plazo_maximo',
        'estado'
    ];
}
