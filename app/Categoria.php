<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function autores(){
      return $this->belongsToMany('App\Autor');
    }

    public function libros(){
		return $this->hasMany('App\Libro');
	}

    public function carreras(){
      return $this->belongsToMany('App\Carrera');
    }
}
