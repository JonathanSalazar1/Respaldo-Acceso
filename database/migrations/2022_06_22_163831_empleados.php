<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('NoEmp',5)->nullable(true);
            $table->string('Grado',10);
            $table->string('NombreCompleto',60);
            $table->string('Adscripcion',80);
            $table->string('Genero',80);
            $table->string('Bloque',80);
            $table->string('Estatus',50);
            $table->string('Institucion',80);
            $table->string('Situacion',80);
            $table->string('Observaciones',200);
            
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
        Schema::dropIfExists('empleados');
    }
}
