<?php

use Hamcrest\Core\HasToString;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registra', function (Blueprint $table) {

            $table->bigInteger('nrohc', 20)->unsigned()->autoIncrement(false);
            
            $table->string('ciadm', 15);
            $table->string('cipaciente', 15);
            $table->string('ciresponsable', 15);
            $table->datetime('fecha')->nullable();
            $table->string('accion', 7);
            $table->timestamps();
            
            $table->foreign('ciadm')->references('ciadm')->on('administrativo')->onUpdate('cascade');
            $table->foreign('cipaciente')->references('cipaciente')->on('paciente')->onUpdate('cascade');
            $table->foreign('ciresponsable')->references('cipaciente')->on('paciente')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registra');
    }
}
