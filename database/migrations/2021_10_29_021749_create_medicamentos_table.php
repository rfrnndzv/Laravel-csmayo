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

            $table->string('medicamento');
            $table->string('indicacion');
            $table->string('crecetada');
            $table->integer('cdispensada')->nullable(true);
            $table->double('valor', 8, 2)->nullable(true);
            $table->BigInteger('nroreceta');

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
