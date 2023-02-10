<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesSuspDesp extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_boleta_pf',
        'id_mercancia_fk',
    ];
}
