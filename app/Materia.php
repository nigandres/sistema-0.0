<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
	public $timestamps = false;
    public function carrera(){
      return $this->belongsTo('App\Carrera');
    }

    public function alumnos(){
      return $this->belongsToMany('App\Alumno');
    }

    public function libros(){
      return $this->belongsToMany('App\Libro');
    }
}
