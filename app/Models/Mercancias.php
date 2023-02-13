<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mercancias extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_merc',
        'peso',
        'cantidad_bulto',
        'valor_mercancia',
        'drs_n_item',
        'unidad_medida',
        'id_almacen_fk',
    ];
}
