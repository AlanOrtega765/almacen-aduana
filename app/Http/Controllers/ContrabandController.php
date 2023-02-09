<?php

namespace App\Http\Controllers;

use App\Models\DetallesContrabandos;
use App\Models\Mercancias;
use App\Models\Personas;
use App\Models\Contrabandos;
use App\Models\DatosVehiculos;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ContrabandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contraband = contrabandos::select('contrabandos.n_rol', 'contrabandos.fecha_contrab', 'contrabandos.fecha_venc_contrab', 'contrabandos.estado',
                                            'personas.tipo_doc_p', 'personas.nro_id_person', 'personas.nombre_p', 'personas.apellido_p', 'personas.nacionalidad_p', 'personas.direccion_p', 'personas.ciudad_p',
                                            'mercancias.nombre_merc', 'mercancias.peso', 'mercancias.cantidad_bulto', 'almacenes.nombre_almc', 'almacenes.avanzada',
                                            'contrabandos.tipo_contrabando', 'contrabandos.nue', 'contrabandos.doc_denunciante', 'contrabandos.doc_cancelacion', 'contrabandos.fecha_canc', 'contrabandos.doc_de_entrega', 'contrabandos.fecha_doc_entrega', 'contrabandos.observaciones')
                    ->join('users', 'users.id', '=', 'contrabandos.id_user_fk')
                    ->join('personas', 'personas.id_person', '=', 'contrabandos.id_persona_fk')
                    ->join('detalles_contrabandos', 'detalles_contrabandos.n_rol_contrab', '=', 'contrabandos.n_rol')
                    ->join('mercancias', 'mercancias.n_rol', '=', 'detalles_contrabandos.n_rol_merc')
                    //->join('datos_vehiculos', 'datos_vehiculos.id_vehiculo', '=', 'detalles_contrabandos.n_rol_contrab')
                    ->join('almacenes', 'almacenes.id_almacen', '=', 'mercancias.id_almacen_fk')
                    ->paginate(10);

        return Inertia::render('Contraband', ['contrabands' => $contraband]);



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

        $mercancias = Mercancias::create([
            'nombre_merc' => $request->descripcion_mercancias,
            'peso' => $request->peso,
            'cantidad_bulto' => $request->bultos,
            'id_almacen_fk' => $request->ubicacion
        ]);

        /*$datos_vehiculos = DatosVehiculos::create([
            'nombre_merc' => $request->descripcion_mercancias,
            'peso' => $request->peso,
            'cantidad_bulto' => $request->bultos,
            'id_almacen_fk' => $request->ubicacion
        ]);*/

        $contrabandos = Contrabandos::create([
            'fecha_contrab' => $request->fecha_contrabando,
            'fecha_venc_contrab' => $request->plazo_maximo,
            'estado' => $request->estado,
            'tipo_contrabando' => $request->tipo_contrabando,
            'nue' => $request->nue,
            'doc_denunciante' => $request->doc_denunciante,
            'doc_cancelacion' => $request->doc_cancelacion,
            'fecha_canc' => $request->fecha_canc,
            'doc_de_entrega' => $request->doc_de_entrega,
            'fecha_doc_entrega' => $request->fecha_doc_entrega,
            'observaciones' => $request->observaciones,
            'id_user_fk' => $user_id,
            'id_persona_fk' => $persona->id
        ]);

        DetallesContrabandos::create([
            'n_boleta_pf' => $contrabandos->id,
            'id_mercancia_fk' => $mercancias->id
        ]);
    }

    public function printPDF($id)
    {
        $contraband = contrabandos::select('contrabandos.n_rol', 'contrabandos.fecha_contrab', 'contrabandos.fecha_venc_contrab', 'contrabandos.estado', 'contrabandos.tipo_contrabando', 'contrabandos.nue',
                                        'contrabandos.doc_denunciante', 'contrabandos.doc_cancelacion', 'contrabandos.fecha_canc', 'contrabandos.doc_de_entrega', 'contrabandos.fecha_doc_entrega', 'contrabandos.observaciones')
            ->where('contrabandos.n_rol', '=', $id)
            ->join('users', 'users.id', '=', 'contrabandos.id_user_fk')
            ->join('personas', 'personas.id_person', '=', 'contrabandos.id_persona_fk')
            ->join('detalles_contrabandos', 'detalles_contrabandos.n_rol_contrab', '=', 'contrabandos.n_rol')
            ->join('mercancias', 'mercancias.n_rol', '=', 'detalles_contrabandos.n_rol_merc')
            //->join('datos_vehiculos', 'datos_vehiculos.id_vehiculo', '=', 'detalles_contrabandos.n_rol_contrab')
            ->join('almacenes', 'almacenes.id_almacen', '=', 'mercancias.id_almacen_fk')
            ->first();

        return Inertia::render('Documents/Contrabandpdf', ['contraband' => $contraband]);
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
