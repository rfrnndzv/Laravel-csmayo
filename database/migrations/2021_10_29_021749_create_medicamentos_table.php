<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('forma');
            $table->string('concentracion');
            $table->string('cantidad');
            $table->string('frecuencia');
            $table->string('tiempouso');
            $table->string('vidaadmin');
            $table->string('crecetada');
            $table->string('cdispensada');
            $table->bigInteger('nroreceta');

            $table->foreign('nroreceta')->references('nroreceta')->on('recetas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamentos');
    }
}
