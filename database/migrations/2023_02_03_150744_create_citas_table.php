<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('seencontroalcliente');
            $table->string('Resultado');
            $table->string('Email');
            $table->string('Nuevocontacto');
            $table->string('Empleado');
            $table->string('Numeropersonal');
            $table->string('Aceptapagar');
            $table->string('observacion');
            $table->string('idEmpleado');
            $table->string('idCobranza');

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
        Schema::dropIfExists('citas');
    }
}
