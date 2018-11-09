<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql')->dropIfExists('autores');
        Schema::connection('pgsql')->create('autores', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('reputacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql')->dropIfExists('autores');
        // Schema::connection('pgsql')->drop('autores');
    }
}
