<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
	public $timestamps = false;
    public function carrera(){
      return $this->belongsTo('App\Carrera');
    }

    public function materias(){
      return $this->belongsToMany('App\Materia');
    }
}
