<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrocancelacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrocancelaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCliente')->nullable();
            $table->string('contacto')->nullable();
            $table->string('nota')->nullable();
            $table->string('fechaCancelacion')->nullable();
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
        Schema::dropIfExists('registrocancelaciones');
    }
}
