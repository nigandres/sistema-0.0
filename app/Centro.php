<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
	protected $connection = 'mysql';
    protected $table = 'centros';
    public $timestamps = false;
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->table;
    }

    public function carreras(){
      return $this->hasMany('App\Carrera');
    }

    public function convenios(){
      return $this->belongsToMany('App\Convenio');
    }
}
