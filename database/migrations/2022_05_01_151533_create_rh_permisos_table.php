<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRhPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rh_permisos', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->id();
            $table->string('fk_id_empleado');
            // $table->foreignId('fk_id_empleado')->nullable()->constrained('empleados')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('fk_id_empleado')->references('id')->on('empleados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fk_id_tipo_permiso')->nullable()->constrained('rh_tipo_permisos')->cascadeOnUpdate()->cascadeOnDelete();
            // $table->foreignId('fk_id_user')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->time('horaSalida')->nullable();
            $table->time('horaEntradaAproximada')->nullable();
            $table->time('horaEntradaReal')->nullable();
            $table->text('motivoTrabajoEnfermedad')->nullable();
            $table->date('fechaSolicitudPermiso')->nullable();
            $table->string('semanaSolicitudPermiso')->nullable();
            $table->string('aniioSolicitudPermiso')->nullable();
            $table->string('lugarSolicitudPermiso')->nullable();
            $table->date('fechaPermisoPersonalDia1')->nullable();
            $table->date('fechaPermisoPersonalDia2')->nullable();
            $table->integer('horasPermisoPersonal')->nullable();
            $table->string('telefonoEmergencia')->nullable();
            $table->string('vehiculoDescripcion')->nullable();
            $table->string('internetVendido')->nullable();
            $table->string('telefonoVendido')->nullable();
            $table->string('lineaVendida')->nullable();
            $table->string('numCertificadoIncapacidad')->nullable();
            $table->string('numAfiliacionIncapacidad')->nullable();
            $table->date('fechaInicioIncapacidad')->nullable();
            $table->date('fechafinalIncapacidad')->nullable();
            $table->string('totalDiasIncapacidad')->nullable();
            $table->string('ihss')->nullable();
            $table->date('fechaInicioSubsidio')->nullable();
            $table->date('fechaFinalSubsidio')->nullable();
            $table->string('totalDiassubsidio')->nullable();
            $table->string('DiasPagarSubsidio')->nullable();
            $table->string('sueldoBaseSubsidio')->nullable();
            $table->string('ObservacionesSubsidio')->nullable();
            $table->string('aprobacion');
            $table->string('nombreQuienCreo')->nullable();
            $table->string('nombreQuienAprobo')->nullable();
             

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
        Schema::dropIfExists('rh_permisos');
    }
}
