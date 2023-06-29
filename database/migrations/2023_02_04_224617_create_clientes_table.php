<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->string('numerotelefonico')->nullable();
            $table->string('nombre')->nullable();
            $table->string('numerodeidentidad')->nullable();
            $table->string('numerodecontacto')->nullable();
            $table->string('municipio')->nullable();
            $table->string('tarifas')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            $table->string('gps')->nullable();
            $table->string('servicioadquirido')->nullable();
            $table->string('tipodeservicio')->nullable();
            $table->string('accion')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
