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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id_paciente');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->date('fecha_nacimiento');
            $table->enum('sexo', ['Masculino', 'Femenino', 'Otro']);
            $table->string('correo', 150)->unique();
            $table->string('telefono', 20)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('usuario', 50)->unique();
            $table->string('password_hash', 255);
            $table->timestamp('fecha_creacion')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
