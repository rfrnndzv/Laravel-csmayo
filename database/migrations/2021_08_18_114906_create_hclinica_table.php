<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHclinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hclinica', function (Blueprint $table) {
            $table->id('nrohc');

            $table->string('codfam', 10);
            $table->string('seguro', 15)->nullable();
            $table->string('establecimiento', 15)->nullable();
            $table->boolean('p1');
            $table->boolean('p2');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hclinica');
    }
}
