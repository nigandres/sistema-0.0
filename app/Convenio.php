<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    public function editorial(){
      return $this->belongsTo('App\Editorial');
    }

    public function centros(){
      return $this->belongsToMany('App\Centro');
    }
}
