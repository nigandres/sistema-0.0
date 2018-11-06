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
        Schema::connection('mongodb')->create('libros', function($table)
        {
            $table->increments('id');
            $table->string('nombre');
            $table->string('ruta');#
            $table->string('tipo');#
            $table->integer('edicion');
            $table->boolean('satatus');
            // $table->integer('paginas');
            // $table->integer('año');
            $table->string('genero');
            $table->integer('autor_id')->unsigned();
            $table->integer('editorial_id')->unsigned();
            $table->timestamps();
        });
        // Schema::create('libros', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('titulo');
        //     $table->integer('edicion');
        //     $table->integer('paginas');
        //     $table->integer('año');
        //     $table->integer('autor_id')->unsigned();
        //     $table->integer('categoria_id')->unsigned();
        //     $table->integer('editorial_id')->unsigned();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
