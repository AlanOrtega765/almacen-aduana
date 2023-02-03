<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAbandonos extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_oficio',
        'n_rol_fk',
        'turno',
    ];
}
