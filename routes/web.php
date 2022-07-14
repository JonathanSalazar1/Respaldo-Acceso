<?php

use App\Http\Controllers\AccesoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\ObservacionesController;
use App\Http\Controllers\EntrcomController;
use App\Http\Controllers\ExternoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ConsultaEmpController;
use App\Http\Controllers\ConsultaVeController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VisitantesController;
use Asm89\Stack\Cors;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('acceso', [AccesoController::class, 'index'])->middleware('auth');
Route::post('check_entry', [AccesoController::class, 'check_entry']);
Route::post('refresh_table_registro', [AccesoController::class, 'refresh_table_registro']);

Route::put('/update/{id}', [ProveedorController::class,'update'])->name('crud.update_provees');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/', function () {
    return view('auth.login');
});

/*Route::get('/entrada', function () {
    return view('entrada');
});
Route::get('entrada', [EntradaController::class,'create']);*/


Route::resource('entrada', EntradaController::class)->middleware('auth');
Route::resource('salida', SalidaController::class)->middleware('auth');
Route::resource('observaciones', ObservacionesController::class)->middleware('auth');
Route::resource('entrcom', EntrcomController::class)->middleware('auth');
Route::resource('externo', ExternoController::class)->middleware('auth');
Route::resource('consulta', ConsultaController::class)->middleware('auth');
Route::resource('proveedores', App\Http\Controllers\ProveedorController::class)->middleware('auth');
Route::resource('visitantes', App\Http\Controllers\VisitantesController::class)->middleware('auth');



Route::get('/edit/{id}',[VisitantesController::class,'edit'])->name('crud.actualizar_visitante');
Route::put('/update/{id}',[VisitantesController::class,'update'])->name('crud.update_visita');

Route::get('vehiculos', [ConsultaVeController::class,'index'])->name('vehiculos.index')->middleware('auth');

Route::get('Empleados',[ConsultaEmpController::class,'index'])->name('empleados.index')->middleware('auth');