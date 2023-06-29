<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobranzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobranzas', function (Blueprint $table) {
            $table->id();
            $table->string('Tipodecliente');
            $table->string('Nombrecliente');
            $table->string('Identidd');
            $table->string('Direccion');
            $table->string('Contacto');
            $table->string('Telefono');
            $table->string('Email');
            $table->string('Estado');
            $table->string('Mora');
            $table->string('Meses');
            $table->string('Nuevadireccion');
            $table->string('cita');
            $table->string('cita_2');
            $table->string('cita_3');
            $table->string('abogado');
            $table->string('abogado_2');
            $table->string('abogado_3');
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
        Schema::dropIfExists('cobranzas');
    }
}
