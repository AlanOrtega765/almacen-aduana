<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSevs extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_sev_pf',

        'id_vehiculo_fk',
    ];
}
