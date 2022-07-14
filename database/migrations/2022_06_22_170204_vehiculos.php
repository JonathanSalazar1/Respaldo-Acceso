<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehiculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id',5);
            //Llave secundaria de tabla empleados
            $table->integer('NoEmp');
            $table->foreign('NoEmp')->references('NoEmp')->on('empleados');

            $table->string('NoPlacas',50);
            $table->string('Marca',50);
            $table->string('Modelo',50);
            $table->string('Color',50);
            $table->date('Vigencia');
            
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
        Schema::dropIfExists('vehiculos');
    }
}
