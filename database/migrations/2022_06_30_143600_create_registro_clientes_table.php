<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_id_par')->nullable()->constrained('pars')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('fk_id_armario')->nullable()->constrained('armarios')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('fk_id_caja_terminal')->nullable()->constrained('caja_terminals')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('telefono');
            $table->string('cliente');
            $table->string('estado');
            $table->string('direccion');
            $table->string('gps');
            $table->string('contacto');
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
        Schema::dropIfExists('registro_clientes');
    }
}
