<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amedica', function (Blueprint $table) {
            $table->id('nroam');
            $table->string('cienf', 15)->nullable();
            $table->string('hingreso', 5)->nullable();
            $table->string('hengreso', 5)->nullable();
            $table->decimal('talla', 5, 2)->nullable();
            $table->decimal('peso', 5, 2)->nullable();
            $table->string('temperatura', 5)->nullable();
            $table->integer('fc')->nullable();
            $table->string('pa', 7)->nullable();
            $table->integer('fr')->nullable();

            $table->foreign('cienf')->references('cienf')->on('enfermera')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amedica');
    }
}
