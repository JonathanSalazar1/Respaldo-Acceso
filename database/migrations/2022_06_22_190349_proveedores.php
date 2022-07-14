<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            //Llave secundaria de tabla empleados
            $table->integer('NoEmp');
            $table->foreign('NoEmp')->references('NoEmp')->on('empleados');
            
            $table->string('NombreProveedor');
            $table->string('Empresa');
            $table->string('Asunto');
            $table->date('Fecha');
            $table->time('h_entrada');
            $table->time('h_salida')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
