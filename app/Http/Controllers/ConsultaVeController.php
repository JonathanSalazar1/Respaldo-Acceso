<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VehiculosModel;

class ConsultaVeController extends Controller
{
   public function index()
   {

        $Vehiculos = VehiculosModel::get();

        return view('crud.consultaVehiculos',compact('Vehiculos'));
   }
}
