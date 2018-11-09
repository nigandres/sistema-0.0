<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->dropIfExists('libros');
        Schema::connection('mongodb')->create('libros', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_editorial')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->double('precio');
            $table->string('nivel_dificultad');
        });
        // Schema::create('libros', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('nombre');
        //     $table->integer('id_editorial')->unsigned();
        //     $table->integer('id_categoria')->unsigned();
        //     $table->double('precio');
        //     $table->string('nivel_dificultad');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('libros');
        // Schema::connection('mongodb')->drop('libros');
    }
}
