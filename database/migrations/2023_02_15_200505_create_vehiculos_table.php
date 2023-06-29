<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();

            $table->string('numerodevehiculo');
            $table->string('placa');
            $table->string('marca');
            $table->string('kilometraje');
            $table->string('cantidaddecombustible');
            $table->string('numeropersonal');
            $table->string('nombredeempleado');
            $table->string('agencia');
            $table->string('observaciones');
            $table->string('accion') ->nullable();
            $table->date('fechadecreacion') ->nullable();
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
