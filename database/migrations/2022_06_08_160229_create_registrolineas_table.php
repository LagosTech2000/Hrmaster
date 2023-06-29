<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrolineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrolineas', function (Blueprint $table) {
            $table->engine="InnoDB";
            // $table->id();
            $table->string('id')->primary()->nullable();
            $table->string('clienteNombre')->nullable();
            $table->string('clienteTelefono')->nullable();
            $table->string('cuotas')->nullable();
            $table->string('numeroCuotas')->nullable();
            $table->string('nombreBeneficiario')->nullable();
            $table->string('beneficiarioParentesco')->nullable();
            $table->string('clienteProfesion')->nullable();
            $table->string('clienteEstadoCivil')->nullable();
            $table->string('telefonoContacto')->nullable();
            $table->string('clienteDireccionTrabajo')->nullable();
            $table->string('clienteCorreo')->nullable();
            $table->string('numLinea')->nullable();
            $table->string('estado')->nullable();
          
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
        Schema::dropIfExists('registrolineas');
    }
}
