<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AutorLibro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql')->dropIfExists('autor_libro');
        Schema::connection('pgsql')->create('autor_libro', function(Blueprint $table) {
        // Schema::create('autor_libro', function (Blueprint $table) {
            $table->string('libro_id')->references('_id')->on('libros');
            $table->integer('autor_id')->references('id')->on('autores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autor_libro');
    }
}
