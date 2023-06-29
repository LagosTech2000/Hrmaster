<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrowifisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrowifis', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('fk_id_linea');
            $table->foreign('fk_id_linea')->references('id')->on('registrolineas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('rtn')->nullable();
            $table->string('wifiTelefonoAsociado')->nullable();
            $table->string('clienteTelefonoOficina')->nullable();
            $table->string('propietarioLinea')->nullable();
            $table->string('nombrePropietario')->nullable();
            $table->string('equipoInstalacion')->nullable();
            $table->string('categorias')->nullable();
            $table->date('fechaSolicitud')->nullable();
            $table->string('megas')->nullable();
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
        Schema::dropIfExists('registrowifis');
    }
}
