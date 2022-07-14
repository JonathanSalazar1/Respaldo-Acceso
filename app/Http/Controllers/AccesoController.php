<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaModel;
use App\Models\EmpleadosModel;
use App\Models\VehiculosModel;
use Illuminate\Http\Request;

class AccesoController extends Controller
{

    public function index()
    {
        return view('acceso');
    }

    public function refresh_table_registro()
    {
        $hoy = date('Y-m-d');
        $ayer  = strtotime("-1 day", strtotime($hoy));
        $ayer = date("Y-m-d", $ayer);        

        $asistencias = AsistenciaModel::select('*')->join('empleados', 'regasistencia.NoEmp', 'empleados.NoEmp')->whereIn('f_entrada', array($hoy,$ayer))->orderBy('regasistencia.id', 'desc')->paginate(5);

        return response()->json($asistencias);
    }

    public function check_entry(Request $request)
    {
        $operation_code = 0;
        $numero_empleado = $request->numero_empleado;

        //Chequear si existe
        $empleado = EmpleadosModel::where("NoEmp", "=", $numero_empleado)->get()->toArray();

        if (count($empleado) > 0) {
            //si existe....chequear si es una entrada o una salida          

            $asistencias = AsistenciaModel::where("NoEmp", "=", $numero_empleado)->orderBy('id', 'desc')->first();

           

            $adscripcion = $empleado[0]["Adscripcion"];
            $estatus = $empleado[0]["Estatus"];
            $horario = date("H:i:s");
            $fecha = date("Y-m-d");

            if ($asistencias == "" || $asistencias->h_salida != NULL) {

                $asistencia = new AsistenciaModel();
                $asistencia->NoEmp = $numero_empleado;
                $asistencia->f_entrada = $fecha;
                $asistencia->h_entrada = $horario;
                $asistencia->adscripcion = $adscripcion;
                $asistencia->estatus = $estatus;

                $asistencia->save();
            } else {

                $id_asistencia = $asistencias->id;

                $asistencia = AsistenciaModel::find($id_asistencia);

                $asistencia->f_salida = $fecha;
                $asistencia->h_salida = $horario;
                $asistencia->adscripcion = $adscripcion;
                $asistencia->estatus = $estatus;

                $asistencia->save();
            }

            $vehiculos = VehiculosModel::where("NoEmp", "=", $numero_empleado)->get()->toArray();

            return response()->json(array($operation_code, $empleado, $vehiculos));
        } else {
            $operation_code = 1;
            return response()->json(array($operation_code));
        }
    }
}
