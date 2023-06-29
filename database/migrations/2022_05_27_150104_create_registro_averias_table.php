<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAveriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_averias', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCliente')->nullable();
            $table->string('numeroDeLinea')->nullable();
            $table->string('contacto')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fechaDeSolicitud')->nullable();
            $table->string('estadoAveria')->nullable();
            $table->string('Megas')->nullable();
            $table->string('numerodearmario')->nullable();
            $table->string('cajaterminal')->nullable();
            $table->string('bornes')->nullable();
            $table->string('reddirecta')->nullable();
            $table->string('parprimario')->nullable();
            $table->string('parsecundario')->nullable();
            $table->string('fechareporte')->nullable();
            $table->string('usuario')->nullable();
            $table->string('falla')->nullable();
            $table->string('abrazadera')->nullable();
            $table->string('anillopostedec')->nullable();
            $table->string('anillopostedem')->nullable();
            $table->string('acomext')->nullable();
            $table->string('acomint')->nullable();
            $table->string('cmodular')->nullable();
            $table->string('gdecasa')->nullable();
            $table->string('mordazas')->nullable();
            $table->string('grapas')->nullable();
            $table->string('grapasre')->nullable();
            $table->string('ganchoj')->nullable();
            $table->string('ganchosposte')->nullable();
            $table->string('grapasd')->nullable();
            $table->string('cjumper')->nullable();
            $table->string('protector')->nullable();
            $table->string('anclajeplastico')->nullable();
            $table->string('conectoruy')->nullable();
            $table->string('tipoaveria')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
            //$table->timestamps('delete_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_averias');
    }
}
