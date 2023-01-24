<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Mercancia extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_rol_fk',
        'tipo_mercancias',
        'Nombre_merc',
        'cantidad',
        'valor_mercancia'
    ];
}