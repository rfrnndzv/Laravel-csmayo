<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmedica', function (Blueprint $table) {
            $table->id('nrocm');
            $table->string('objetivo')->nullable();
            $table->string('subjetivo')->nullable();
            $table->string('paccion')->nullable();
            $table->string('analisis')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmedica');
    }
}
