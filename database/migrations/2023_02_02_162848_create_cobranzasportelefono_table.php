<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobranzasportelefonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobranzasportelefono', function (Blueprint $table) {
            $table->id();

            $table->string('Telefono');
            $table->string('Nombrecliente');
            $table->string('Identidd');
            $table->string('Direccion');
            $table->string('Estado');

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
        Schema::dropIfExists('cobranzasportelefono');
    }
}
