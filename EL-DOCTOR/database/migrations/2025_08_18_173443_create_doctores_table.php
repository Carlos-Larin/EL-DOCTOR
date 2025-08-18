<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->increments('id_doctor');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('correo', 150)->unique();
            $table->string('telefono', 20)->nullable();
            $table->string('especialidad', 100)->nullable();
            $table->string('numero_colegiado', 50)->unique();
            $table->string('usuario', 50)->unique();
            $table->string('password_hash', 255);
            $table->string('direccion_clinica', 200)->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->dateTime('ultimo_login')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctores');
    }
};
