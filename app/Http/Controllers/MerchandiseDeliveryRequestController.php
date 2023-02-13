<?php

namespace App\Http\Controllers;

use App\Models\DetalleSems;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Mercancias;
use App\Models\Personas;
use App\Models\Sems;
use App\Models\Almacen;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;


class MerchandiseDeliveryRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serm = Sems::select('sems.numero_sem', 'sems.fecha_llegada', 'sems.fecha_venc', 'sems.aduana_presenta', 'sems.tipo_cancelacion',
        'sems.entrega_maxima', 'sems.numero_lig_grav', 'sems.fecha_gcp', 'sems.drs_fecha', 'sems.drs_fecha_venc', 'sems.drs_tipo', 'sems.drs_numero', 'sems.total_general',
        'personas.tipo_doc_p', 'personas.nro_id_person', 'personas.nombre_p', 'personas.apellido_p', 'personas.nacionalidad_p', 'personas.direccion_p', 'personas.ciudad_p',
        'mercancias.nombre_merc', 'mercancias.peso', 'mercancias.cantidad_bulto', 'mercancias.unidad_medida', 'mercancias.drs_n_item', 'mercancias.valor_mercancia',
        'almacenes.nombre_almc', 'almacenes.avanzada', 'sems.observacion', 'sems.estado')
            ->join('users', 'users.id', '=', 'sems.id_user_fk')
            ->join('personas', 'personas.id_person', '=', 'sems.id_persona_fk')
            ->join('detalles_sems', 'detalles_sems.numero_sem_pf', '=', 'sems.numero_sem')
            ->join('mercancias', 'mercancias.id_mercancia', '=', 'detalles_sems.id_mercancia_fk')
            ->join('almacenes', 'almacenes.id_almacen', '=', 'mercancias.id_almacen_fk')
            ->paginate(10);

            return Inertia::render('MerchandiseDeliveryRequest', ['servicioentmercancias' => $serm]);
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
            'nombre_p' => $request->nombres_persona,
            'apellido_p' => $request->apellidos_persona,
            'tipo_doc_p' => $request->tipo_doc_persona,
            'nro_id_person' => $request->n_doc_persona,
            'direccion_p' => $request->direccion,
            'nacionalidad_p' => $request->nacionalidad,
            'ciudad_p' => $request->ciudad,
        ]);

        $mercancias = Mercancias::create([
            'nombre_merc' => $request->descripcion_mercancias,
            'peso' => $request->peso,
            'cantidad_bulto' => $request->bultos,
            'unidad_medida' => $request->unidad_medida,
            'drs_n_item' => $request->drs_n_item,
            'valor_mercancia' => $request->valor_mercancia,

            'id_almacen_fk' => $request->ubicacion
        ]);

        $semsem = Sems::create([
            'fecha_llegada' => $request->fecha_llegada,
            'fecha_venc' => $request->plazo_maximo,
            'aduana_presenta' => $request->aduana_presenta,
            'tipo_cancelacion' => $request->tipo_cancelacion,
            'estado' => $request->estado,
            'observacion' => $request->observacion,
            'total_general' => $request->total_general,
            'numero_lig_grav' => $request->numero_lig_grav,
            'fecha_gcp' => $request->fecha_gcp,
            'drs_fecha' => $request->drs_fecha,
            'drs_fecha_venc' => $request->drs_fecha_venc,
            'drs_tipo' => $request->drs_tipo,
            'drs_numero' => $request->drs_numero,
            'id_user_fk' => $user_id,
            'id_persona_fk' => $persona->id
        ]);

        $detallessem = DetalleSems::create([
            'numero_sem_pf' => $semsem->id,
            'id_mercancia_fk' => $mercancias->id
        ]);
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

    public function printPDF($id) //Funcion utilizada para crear documento PDF de Retentionpdf
    {
        $serm = Sems::select('sems.numero_sem', 'sems.fecha_llegada', 'sems.fecha_venc', 'sems.aduana_presenta', 'sems.tipo_cancelacion',
        'sems.entrega_maxima', 'sems.numero_lig_grav', 'sems.fecha_gcp', 'sems.drs_fecha', 'sems.drs_fecha_venc', 'sems.drs_tipo', 'sems.drs_numero', 'sems.total_general',
        'personas.tipo_doc_p', 'personas.nro_id_person', 'personas.nombre_p', 'personas.apellido_p', 'personas.nacionalidad_p', 'personas.direccion_p', 'personas.ciudad_p',
        'mercancias.nombre_merc', 'mercancias.peso', 'mercancias.cantidad_bulto', 'mercancias.unidad_medida', 'mercancias.drs_n_item', 'mercancias.valor_mercancia',
        'almacenes.nombre_almc', 'almacenes.avanzada', 'sems.observacion', 'sems.estado')
            ->join('users', 'users.id', '=', 'sems.id_user_fk')
            ->join('personas', 'personas.id_person', '=', 'sems.id_persona_fk')
            ->join('detalles_sems', 'detalles_sems.numero_sem_pf', '=', 'sems.numero_sem')
            ->join('mercancias', 'mercancias.id_mercancia', '=', 'detalles_sems.id_mercancia_fk')
            ->join('almacenes', 'almacenes.id_almacen', '=', 'mercancias.id_almacen_fk')
            ->first();

        return Inertia::render('Documents/MerchandiseDeliveryRequest', ['servicioentmercancias' => $serm]);
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
