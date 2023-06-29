<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();

            $table->string('numerodearchivo');
            $table->string('gavetadearchivo')->nullable();
            $table->string('numerotelefonico')->nullable();
            $table->string('nombre')->nullable();
            $table->string('numerodecontacto')->nullable();
            $table->string('numerodeidentidad')->nullable();
            $table->string('municipio')->nullable();
            $table->string('tipodeservicio')->nullable();
            $table->string('servicioadquirido')->nullable();
            $table->string('estado')->nullable();
            $table->string('completo')->nullable();
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
        Schema::dropIfExists('archivos');
    }
}
