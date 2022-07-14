<?php

namespace App\Http\Controllers;

use App\Models\Visitantes;
use Illuminate\Http\Request;

class VisitantesController extends Controller
{
    public function index() {
        $datosVisitantes = Visitantes::all();
        return view('crud.visitantes',compact('datosVisitantes'));
    }

    public function create()
    {
        return view ('visitantes');
    }

    public function store(Request $request)
    {
        $datosVisitantes =request()->except('_token');
        Visitantes::insert($datosVisitantes);
        return redirect('visitantes')->with('success','Registrado exitosamente');
    }

    public function show(Visitantes $visitantes)
    {
        //
    }

    public function edit($id)
    {
        $datosVisitantes = Visitantes::find($id);
        return view('crud.actualizar_visitante',compact('datosVisitantes'));
    }

    public function update(Request $request, $id)
    {
        $datosVisitantes = Visitantes::find($id);
        $datosVisitantes->Fecha = $request->post('Fecha');
        $datosVisitantes->Nombre = $request->post('Nombre');
        $datosVisitantes->ApellidoPaterno =$request->post('ApellidoPaterno');
        $datosVisitantes->ApellidoMaterno=$request->post('ApellidoMaterno');
        $datosVisitantes->Asunto=$request->post('Asunto');
        $datosVisitantes->Identificacion=$request->post('Identificacion');
        $datosVisitantes->h_entrada=$request->post('h_entrada');
        $datosVisitantes->h_salida=$request->post('h_salida');
        $datosVisitantes->save();

        return redirect()->route('visitantes.index')->with('success','Actualizado con Exito!');
    }

    public function destroy(Visitantes $visitantes)
    {
        //
    }

}
