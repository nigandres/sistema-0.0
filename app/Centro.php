<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
	public $timestamps = false;
    public function carreras(){
      return $this->hasMany('App\Carrera');
    }

    public function convenios(){
      return $this->belongsToMany('App\Convenio');
    }
}
