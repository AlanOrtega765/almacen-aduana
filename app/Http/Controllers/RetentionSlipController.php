<?php

namespace App\Http\Controllers;

use App\Models\DetallesRetenciones;
use App\Models\Mercancias;
use App\Models\Personas;
use App\Models\Retenciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RetentionSlipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retentions = Retenciones::query()->paginate(10);
        return Inertia::render('RetentionSlip', ['retentions' => $retentions]);
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
            'nacionalidad_p' => $request->nacionalidad
        ]);

        $mercancias = Mercancias::create([
            'nombre_merc' => $request->descripcion_mercancias,
            'peso' => $request->peso,
            'cantidad_bulto' => $request->bultos,
            'id_almacen_fk' => $request->ubicacion
        ]);

        $retenciones = Retenciones::create([
            'fecha_reten' => $request->fecha_boleta,
            'fecha_venc' => $request->plazo_maximo,
            'franquicia' => $request->franquicia,
            'estado' => $request->estado,
            'observaciones' => $request->observaciones,
            'id_user_fk' => $user_id,
            'id_persona_fk' => $persona->id
        ]);

        DetallesRetenciones::create([
            'n_boleta_pf' => $retenciones->id,
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
        $retention = Retenciones::find($id)->simplePaginate(1);
        return $retention;
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
