<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosVehiculos extends Model
{
    use HasFactory;
    protected $fillable = [

        'marca_vehiculo',
        'nom_d_vehiculo',
        'ppu',
        'tipo_vehiculo',
        'modelo_vehiculo',
        'chasis_veh',
        'n_motor_vehiculo',
        'anho_fabric',
        'origen_veh',
        'id_almacen_fk',
    ];
}
