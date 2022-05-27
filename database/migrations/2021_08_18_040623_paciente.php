<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function(Blueprint $table){
            $table->string('cipaciente', 15)->primary();
            $table->string('apcasada', 15)->nullable();
            $table->date('fnac')->nullable();
            $table->char('sexo');
            $table->string('procedencia', 30)->nullable();
            $table->string('idioma', 30)->nullable();
            $table->string('idiomamat', 30)->nullable();
            $table->string('autopercult', 30)->nullable();
            $table->string('ocupacion', 25)->nullable();
            $table->string('ocomunitaria', 25)->nullable();
            $table->string('decididor', 50);
            $table->string('ecivil', 18);
            $table->string('escolaridad', 15)->nullable();
            $table->string('nacionalidad', 30)->nullable();
            $table->string('depto', 10)->nullable();
            $table->string('direccion', 50)->nullable();
            $table->integer('nrodomicilio')->nullable();
            $table->string('telefono', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paciente');
    }
}
