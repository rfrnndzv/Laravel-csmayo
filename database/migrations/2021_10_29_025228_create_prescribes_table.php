<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescribes', function (Blueprint $table) {
            $table->string('nr')->nullable(true);
            $table->bigInteger('nroreceta', 20)->autoIncrement(false);
            $table->string('codd')->autoIncrement(false);

            $table->foreign('nroreceta')->references('nroreceta')->on('recetas')->onUpdate('cascade');
            $table->foreign('codd')->references('codd')->on('diagnosticos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescribes');
    }
}
