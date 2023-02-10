<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesAbandonos extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_oficio',
        'id_mercancia_fk',
        'turno',
    ];
}
