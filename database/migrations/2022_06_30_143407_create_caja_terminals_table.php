<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajaTerminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caja_terminals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_id_armario')->nullable()->constrained('armarios')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('descripcion');
            $table->string('direccion');
            $table->string('gps_caja_terminal');
            
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
        Schema::dropIfExists('caja_terminals');
    }
}
