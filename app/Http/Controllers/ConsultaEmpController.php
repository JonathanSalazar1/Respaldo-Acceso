<?php

namespace App\Http\Controllers;

use App\Models\EmpleadosModel;
use Illuminate\Http\Request;

class ConsultaEmpController extends Controller
{
    public function index(){
        $Emp = EmpleadosModel::get();

        return view('crud.consultaEmp',compact('Emp'));
    }
}
