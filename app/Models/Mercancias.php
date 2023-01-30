<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mercancias extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad_bulto',
        'nombre_merc',
        'peso',
        'valor_mercancia',
        'id_almacen_fk'
    ];
}
