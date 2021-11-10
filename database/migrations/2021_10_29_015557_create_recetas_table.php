<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->bigInteger('nroreceta')->primary()->autoIncrement(false);
            
            $table->string('tipoatencion');
            $table->datetime('fecha');
            $table->string('cifarm', 15);

            $table->foreign('cifarm')->references('cifarm')->on('farmaceuticos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recetas');
    }
}
