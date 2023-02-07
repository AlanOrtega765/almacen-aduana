<?php

namespace App\Http\Controllers;

use App\Models\DetalleSevs;
use App\Models\DatosVehiculos;
use App\Models\Personas;
use App\Models\Sevs;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class VehicleDeliveryRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index() // Retenciones mostradas en interfaz Boletas Retención
    {
        $serv = Sevs::select('sevs.numero_sev', 'sevs.fecha_llegada', 'sevs.fecha_venc', 'sevs.estado', 'personas.observacion',
                            'personas.tipo_doc_p', 'personas.nro_id_person', 'personas.nombre_p', 'personas.apellido_p', 'personas.nacionalidad_p', 'personas.direccion_p', 'personas.ciudad_p',
                            'datos_vehiculos.marca_vehiculo', 'datos_vehiculos.nom_d_vehiculo', 'datos_vehiculos.ppu', 'datos_vehiculos.tipo_vehiculo', 'datos_vehiculos.modelo_vehiculo', 'datos_vehiculos.chasis_veh', 'datos_vehiculos.n_motor_vehiculo', 'datos_vehiculos.anho_fabric', 'datos_vehiculos.origen_veh',
                            'almacenes.nombre_almc', 'almacenes.avanzada', 'sevs.observaciones')
            ->join('users', 'users.id', '=', 'sevs.id_user_fk')
            ->join('personas', 'personas.id_person', '=', 'sevs.id_persona_fk')
            ->join('detalles_sevs', 'detalles_sevs.numero_sev_pf', '=', 'sevs.numero_sev')
            ->join('datos_vehiculos', 'datos_vehiculos.id_vehiculo', '=', 'detalles_sevs.id_vehiculo_fk')
            ->join('almacenes', 'almacenes.id_almacen', '=', 'datos_vehiculos.id_almacen_fk')
            ->paginate(10);

        return Inertia::render('VehicleDeliveryRequest', ['servicioentvehiculos' => $serv]);

        //return Inertia::render('VehicleDeliveryRequest');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        $persona = Personas::create([
            'nombre_p' => $request->nombres_imputado,
            'apellido_p' => $request->apellidos_imputado,
            'tipo_doc_p' => $request->tipo_doc_imputado,
            'nro_id_person' => $request->n_doc_imputado,
            'direccion_p' => $request->direccion,
            'nacionalidad_p' => $request->nacionalidad,
            'ciudad_p' => $request->ciudad,
        ]);

        $datos_vehiculos = DatosVehiculos::create([
            'nombre_merc' => $request->descripcion_mercancias,
            'peso' => $request->peso,
            'cantidad_bulto' => $request->bultos,
            'id_almacen_fk' => $request->ubicacion
        ]);

        $sevsev = Sevs::create([
            'fecha_llegada' => $request->fecha_llegada,
            'fecha_venc' => $request->plazo_maximo,
            'estado' => $request->estado,
            'observacion' => $request->observacion,

            'id_user_fk' => $user_id,
            'id_persona_fk' => $persona->id
        ]);

        DetalleSevs::create([
            'numero_sev' => $sevsev->id,
            'id_vehiculo_fk' => $datos_vehiculos->id
        ]);
    }

    public function printPDF($id)
    {
        $serv = Sevs::select('sevs.numero_sev', 'sevs.fecha_llegada', 'sevs.fecha_venc', 'sevs.estado', 'personas.observacion',
                            'personas.tipo_doc_p', 'personas.nro_id_person', 'personas.nombre_p', 'personas.apellido_p', 'personas.nacionalidad_p', 'personas.direccion_p', 'personas.ciudad_p',
                            'datos_vehiculos.marca_vehiculo', 'datos_vehiculos.nom_d_vehiculo', 'datos_vehiculos.ppu', 'datos_vehiculos.tipo_vehiculo', 'datos_vehiculos.modelo_vehiculo', 'datos_vehiculos.chasis_veh', 'datos_vehiculos.n_motor_vehiculo', 'datos_vehiculos.anho_fabric', 'datos_vehiculos.origen_veh',
                            'almacenes.nombre_almc', 'almacenes.avanzada', 'sevs.observaciones')
            ->join('users', 'users.id', '=', 'sevs.id_user_fk')
            ->join('personas', 'personas.id_person', '=', 'sevs.id_persona_fk')
            ->join('detalles_sevs', 'detalles_sevs.numero_sev_pf', '=', 'sevs.numero_sev')
            ->join('datos_vehiculos', 'datos_vehiculos.id_vehiculo', '=', 'detalles_sevs.id_vehiculo_fk')
            ->join('almacenes', 'almacenes.id_almacen', '=', 'datos_vehiculos.id_almacen_fk')
            ->first();

        return Inertia::render('Documents/VehicleDeliveryRequestpdf', ['ServicioentVehiculo' => $serv]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
