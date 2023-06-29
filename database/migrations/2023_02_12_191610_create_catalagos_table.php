<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCatalagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalagos', function (Blueprint $table) {
            $table->id();

            $table->string('nombredeldocumento')->nullable();
            $table->string('fechadecreacion')->nullable();
            $table->string('fechadeedicion')->nullable();
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('catalagos');
    }
}
