<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comandantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comandantes', function (Blueprint $table) {
            $table->id();
            
            $table->integer('NoEmp');
            $table->foreign('NoEmp')->references('NoEmp')->on('empleados');

            $table->date('Fecha');
            $table->time('Hora');
            $table->string('adscripcion');
            $table->string('estatus');
            $table->string('motivo');
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
