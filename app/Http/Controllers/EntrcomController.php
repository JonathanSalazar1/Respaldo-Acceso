<?php

namespace App\Http\Controllers;

use App\Models\entrcom;
use Illuminate\Http\Request;

class EntrcomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('crud.entrcom');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('crud.entrcom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosEntradaCom =request()->except('_token');
        entrcom::insert($datosEntradaCom);
        return redirect('entrcom')->with('success','Registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\entrcom  $entrcom
     * @return \Illuminate\Http\Response
     */
    public function show(entrcom $entrcom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\entrcom  $entrcom
     * @return \Illuminate\Http\Response
     */
    public function edit(entrcom $entrcom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\entrcom  $entrcom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, entrcom $entrcom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entrcom  $entrcom
     * @return \Illuminate\Http\Response
     */
    public function destroy(entrcom $entrcom)
    {
        //
    }
}
