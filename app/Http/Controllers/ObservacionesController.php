<?php

namespace App\Http\Controllers;

use App\Models\Observaciones;
use Illuminate\Http\Request;

class ObservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('crud.observaciones');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('observaciones');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosObservaciones =request()->except('_token');
        Observaciones::insert($datosObservaciones);
        return redirect('observaciones')->with('success','Registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observaciones  $observaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Observaciones $observaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Observaciones  $observaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Observaciones $observaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observaciones  $observaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observaciones $observaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observaciones  $observaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observaciones $observaciones)
    {
        //
    }
}
