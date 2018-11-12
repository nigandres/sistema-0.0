<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
	protected $connection = 'mysql';
    protected $table = 'alumnos';
    public $timestamps = false;
    public function getConexion()
    {
        return $this->connection;
    }
    public function getTabla()
    {
        return $this->table;
    }

    public function carrera(){
      return $this->belongsTo('App\Carrera');
    }

    public function materias(){
      return $this->belongsToMany('App\Materia');
    }
}
