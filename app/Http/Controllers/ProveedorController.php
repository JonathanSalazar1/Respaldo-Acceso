<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use App\Models\EmpleadosModel;
use Empleados;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index() {
        $datosProveedores = Proveedores::all();
        return view('crud.proveedores',compact('datosProveedores'));
    }

    public function create()
    {
        return view ('proveedores');
    }

    public function store(Request $request)
    {
        $datosProveedores =request()->except('_token');
        Proveedores::insert($datosProveedores);
        return redirect('proveedores')->with('success','Registrado exitosamente');
    }

    public function show(Proveedores $proveedores)
    {
        //
    }

    public function edit($id)
    {
        //
        $datosProveedores = Proveedores::find($id);
        return view('crud.actualizar_provee',compact('datosProveedores'));

    }

    public function update(Request $request, $id)
    {
        //
        $datosProveedores = Proveedores::find($id);
        $datosProveedores->Empresa = $request->post('Empresa');
        $datosProveedores->NombreProveedor = $request->post('NombreProveedor');
        $datosProveedores->Asunto = $request->post('Asunto');
        $datosProveedores->h_entrada = $request->post('h_entrada');
        $datosProveedores->h_salida = $request->post('h_salida');
        $datosProveedores->fecha = $request->post('fecha');
        $datosProveedores->save();

        return redirect()->route("proveedores.index")->with("success", "Actualizado con Exito!");
    }

    public function destroy(Proveedores $proveedores)
    {
        //
    }
}
