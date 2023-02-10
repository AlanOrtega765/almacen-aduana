<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\DetalleAbandonos;
use App\Models\Mercancias;
use App\Models\Abandonos;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;


class AbandonmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abandonos = Abandonos::select('abandonos.n_oficio', 'abandonos.fecha_oficio', 'abandonos.fecha_venc',
                                      'abandonos.fecha_recepcion', 'abandonos.observacion', 'abandonos.estado', 'detalles_abandonos.turno')
            ->join('users', 'users.id', '=', 'abandonos.id_users_fk')
            ->join('detalles_abandonos', 'detalles_abandonos.n_oficio', '=', 'abandonos.n_oficio')
            ->join('mercancias', 'mercancias.id_mercancia', '=', 'detalles_abandonos.id_mercancia_fk')
            ->join('almacenes', 'almacenes.id_almacen', '=', 'mercancias.id_almacen_fk')
            ->paginate(10);

        return Inertia::render('Abandonments', ['abandonments' => $abandonos]);

        return Inertia::render('Abandonments');
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

        $mercancias = Mercancias::create([
            'nombre_merc' => $request->descripcion_mercancias,
            'peso' => $request->peso,
            'cantidad_bulto' => $request->bultos,
            'id_almacen_fk' => $request->ubicacion
        ]);

        $abandonos = Abandonos::create([
            'fecha_oficio' => $request->fecha_oficio,
            'fecha_venc' => $request->plazo_maximo,
            'fecha_recepcion' => $request->fecha_recepcion,
            'observacion' => $request->observacion,
            'estado' => $request->estado,
            'id_users_fk' => $user_id,
        ]);

        DetalleAbandonos::create([
            'n_oficio' => $abandonos->id,
            'turno' =>  $request->turno,
            'id_mercancia_fk' => $mercancias->id,
        ]);
    }

    public function printPDF($id)
    {
        $abandono = Abandonos::select('abandonos.n_oficio', 'abandonos.fecha_oficio', 'abandonos.fecha_venc',
                                    'abandonos.fecha_recepcion', 'abandonos.observacion', 'abandonos.estado', 'detalles_abandonos.turno')
    ->join('users', 'users.id', '=', 'abandonos.id_users_fk')
    ->join('detalles_abandonos', 'detalles_abandonos.n_oficio', '=', 'abandonos.n_oficio')
    ->join('mercancias', 'mercancias.id_mercancia', '=', 'detalles_abandonos.id_mercancia_fk')
    ->join('almacenes', 'almacenes.id_almacen', '=', 'mercancias.id_almacen_fk')
    ->first();

        return Inertia::render('Documents/Contrabandpdf', ['contraband' => $abandono]);
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
