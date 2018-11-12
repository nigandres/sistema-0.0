<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Materia extends Model
{
    use HybridRelations;
    protected $connection = 'mysql';
    protected $table = 'materias';
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

    public function alumnos(){
      return $this->belongsToMany('App\Alumno');
    }

    public function libros(){
      return $this->belongsToMany('App\Libro');
    }
}
