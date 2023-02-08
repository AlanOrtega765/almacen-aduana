<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSems extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_sem_pf',
        'n_rol_fk',
    ];
}
